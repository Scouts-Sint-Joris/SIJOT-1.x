<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

/**
 * @author: Tim Joosten
 * @copyright: Closed License, Tim Joosten
 * @package: Scouts website (http://www.st-joris-turnhout.be)
 *
 * @todo Clean out comments
 * @todo Clean out variables
 */
class leiding extends CI_Controller
{
    // Constructor
    public $Session       = array();
    public $Permissions   = array();
    public $Error_message = array();
    public $Error_heading = array();

    // public $Redirect

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_leiding', 'Leiding');
        $this->load->model('Model_log', 'Log');
        $this->load->model('Model_session', 'DBsession');
        $this->load->model('user', '', TRUE);

        $this->load->library(array('email'));
        $this->load->helper(array('email', 'string', 'logger'));

        $this->Session     = $this->session->userdata('logged_in');
        $this->Permissions = $this->session->userdata('Permissions');

        $this->Error_heading = "No permission";
        $this->Error_message = "U hebt geen rechten om deze handeling uit te voeren";

        $this->Redirect = $this->config->item('Redirect', 'Not_logged_in');
    }
    // END Constructor

    /**
     * Output de leidings pagina.
     */
    public function Leidingsploeg()
    {
        $Data = array(
            'Title' => 'Leidingsploeg',
            'Active' => '1',
            'ploeg' => $this->Leiding->ploeg(),
        );

        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/leidingsploeg', $Data);
        $this->load->view('components/footer');
    }

    /*
     *
     */
    public function index()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $data = array(
                    'Title' => 'Leiding',
                    'Active' => '6',
                    'Admin' => $this->Leiding->Administrators(),
                    'Leiding' => $this->Leiding->Leiding(),
                );

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/leiding', $data);
                $this->load->view('components/footer');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * View voor het wijzigen van de login credentials.
     *
     * @return Session    = View
     * @return No Session = Redirect
     */
    public function Settings()
    {
        if ($this->Session) {
            // General variables
            $data = array(
                'Title' => 'Account configuratie',
                'Active' => '7',
            );

            // Database variables. Not an array because it is one item.
            $DB['Account'] = $this->Leiding->Account();

            $this->load->view('components/admin_header', $data);
            $this->load->view('components/navbar_admin', $data);
            $this->load->view('admin/settings', $DB);
            $this->load->view('components/footer');
        } else {
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     *
     */
    public function Settings_edit()
    {
        if ($this->Session) {
            // Old Session
            $Session = $this->session->userdata('logged_in');

            // Dun'no where i used this variables.
            // I was drunk when i writing those variables.
            $data['id'] = $Session['id'];
            $data['Admin'] = $Session['Admin'];
            $data['User'] = $Session['username'];
            $data['Tak'] = $Session['Tak'];
            $data['Theme'] = $Session['Theme'];

            // New database
            $Update = array(
                "id" => $data['id'],
                "Admin" => $data['Admin'],
                "username" => $data['User'],
                "Tak" => $data['Tak'],
                "Theme" => $this->input->post('Theme'),
            );

            $this->session->set_userdata('logged_in', $Update);

            // Write to database
            $this->Leiding->Settings_edit();

            // Logging
            user_log($this->Session['username'], 'Heeft zijn gegevens gewijzigd');
            redirect('Leiding/Settings', 'Refresh');
        } else {
            redirect($this->Redirect, 'Refresh');
        }
    }

    public function Insert_leiding()
    {
        if ($this->Session) {
            // Mail variables
            $Mail = array(
                'Mail' => $this->input->post('Mail'),
                'Pass' => random_string('alnum', 16),
                'Name' => $this->input->post('Naam'),
            );

            $Mail_view = $this->load->view('email/login', $Mail, TRUE);

            // Email the new user
            $this->email->from('Webmaster@st-joris-turnhout.be', 'Webmaster');
            $this->email->to($this->input->post('Mail'));
            $this->email->subject('Login gegevens');
            $this->email->message($Mail_view);
            $this->email->set_mailtype('html');
            $this->email->send();

            // Logging
            // user_log('Server','Heeft een administrator / leiding toegevoegt. ');

            // Database Handlings
            $this->Log->Created_login();
            $user_id = $this->Leiding->Leiding_insert($Mail);

            $this->Leiding->insert_permission($user_id);
            redirect('leiding');
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Blokkeer een login.
     */
    function Leiding_block()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $this->Leiding->Leiding_Block();
                $this->DBsession->deleteSession($this->uri->segment(3));
                $this->Log->block();

                // Logging
                user_log($this->Session['username'], 'Heeft een login geblokkeerd.');
                redirect('leiding');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Deblokkeer een login.
     */
    public function Leiding_unblock()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $this->Leiding->Leiding_unblock();
                $this->Log->Log_Unblock();

                // Logging
                user_log($this->Session['username'], 'Heeft terug een login geactiveerd');
                redirect('leiding');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Maak leiding tot administror.
     */
    function Leiding_upgrade()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $Leiding = $this->Leiding->Get_user();

                foreach ($Leiding as $Output) {
                    $Mailing = array(
                        'Naam' => $Output->username,
                        'Email' => $Output->Mail,
                    );
                }

                $this->Log->Add_admin();
                $this->Leiding->Leiding_upgrade($Mailing);

                // Logging
                user_log($this->Session['username'], 'Heeft een leider(ster) tot administrator gemaakt.');
                redirect('leiding');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * maak een login van administrator naar leiding.
     */
    function Leiding_downgrade()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $this->Log->Delete_admin();
                $this->Leiding->Leiding_downgrade();

                // Logging
                user_log($this->Session['username'], 'Heeft een administrator zijn rechten ingetrokken.');
                redirect('leiding');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Verwijder een leiding login.
     */
    function Leiding_delete()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $Leiding = $this->Leiding->Get_user();

                foreach ($Leiding as $Output) {
                    $user_id          = $Output->id;
                    $Mailing['Email'] = $Output->Mail;
                }

                $this->Log->Delete_login();
                $this->Leiding->Leiding_delete($Mailing);
                $this->Leiding->delete_permissions($user_id);
                $this->user->setOffline();

                // Logging
                user_log($this->Session['username'], 'Heeft een login verwijderd.');
                redirect('leiding');
            } else {
                $this->load->view('alerts/no_permission');
            }
        } else {
            redirect($this->Redirect, 'refresh');
        }
    }
}
