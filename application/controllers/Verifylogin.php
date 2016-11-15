<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login verification.
 *
 * @author Tim Joosten
 * @license: Closed license
 * @since 2015
 * @package Website-controllers
 */
class VerifyLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('Model_session', 'DBsession');
        $this->load->model('Model_log', 'logger');
        $this->load->helper(array('string'));
        $this->load->library(array('email', 'form_validation'));
    }

    function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            // $this->logger->logged_in();
            // $this->user->setLoginStamp();
            // $this->user->setOnline();
            redirect('backend', 'refresh');
        }

    }

    /**
     * Run the login against the database.
     *
     * @todo  Set invidual permissions.
     * @param $password
     * @return bool
     */
    function check_database($password)
    {
        // Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);

        if ($result) {
            $auth_array       = array();
            $permission_array = array();

            foreach ($result as $row) {
                $auth['id']       = $row->id;
                $auth['username'] = $row->username;
                $auth['Admin']    = $row->Admin_role;
                $auth['Tak']      = $row->Tak;
                $auth['Theme']    = $row->Theme;
                $auth['Email']    = $row->Mail;

                $this->session->set_userdata('logged_in', $auth);
                $permissions = $this->user->permissions($auth['id']);

                foreach($permissions as $permission) {
                    $perms['user_is']     = $auth['id'];
                    $perms['verhuur']     = $permission->verhuur;
                    $perms['mailinglist'] = $permission->mailinglist;
                    $perms['drive']       = $permission->drive;
                    $perms['profiles']    = $permission->profiles;
                }

                    $this->DBsession->setUserId(
                    $this->session->userdata('logged_in', 'id')
                );

                $this->session->set_userdata('Permissions', $perms);

                // For debugging proposes only.
                // -----------------------------
                // var_dump($this->session->userdata('Permissions'));
                // die();

            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Foutief wachtwoord of gebruikersnaam');
            return false;
        }
    }

    /**
     * Wachtwoord reset
     */
    function reset()
    {
        $Output = $this->user->reset_pass();

        if (count($Output) == 1) {
            // Write to database
            $New['New'] = random_string('alnum', 16);

            // Insert to database
            $this->user->insert_new($New);

            // Logging
            // user_log($this->input->post('recovery'), 'Heeft een wachtword reset aangevraagd.');

            // Email
            $mail = $this->load->view('email/reset', $New, TRUE);

            // Mail voor bevestiging
            $this->email->from('contact@st-joris-turnhout.be', 'Contact st-joris turnhout');
            $this->email->to($this->input->post('recovery'));
            $this->email->bcc('Topairy@gmail.com');
            $this->email->subject('Reset wachtwoord - Sint Joris Turnhout');
            $this->email->message($mail);
            $this->email->set_mailtype("html");
            $this->email->send();
            $this->email->clear();

            $this->load->view('alerts/reset_success');
        } else {
            $this->load->view('alerts/reset_failed');
        }
    }
}
