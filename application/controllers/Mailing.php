<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * class: Mailing
 */
class Mailing extends CI_Controller
{
    public $Permissions   = array();
    public $Session       = array();
    public $Error_heading = array();
    public $Error_message = array();

    /**
     * mailing constructor.
     *
     * @return void
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_mailing', 'Mailing');
        $this->load->helper(array('Email', 'logger'));
        $this->load->library(array('Email'));

        $this->Session     = $this->session->userdata('logged_in');
        $this->Permissions = $this->session->userdata('Permissions');
    }

    /**
     * Index for mailing backend. 
     * 
     * @return view|redirect
     */
    public function index()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $Data = array(
                    'Title' => 'Mailing',
                    'Active' => '6',
                    'Mailing' => $this->Mailing->Mailing(),
                );

                $this->load->view('components/admin_header', $Data);
                $this->load->view('components/navbar_admin', $Data);
                $this->load->view('admin/Mailing', $Data);
                $this->load->view('components/footer');
            } else {
                $Data['Heading'] = $this->Error_heading;
                $Data['Message'] = $this->Error_message;

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            redirect('Admin', 'Refresh');
        }
    }

    /**
     * Send all the mails. 
     * 
     * @return redirect.
     */
    public function Mail()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $List = $this->input->post('List');

                // Switch statement
                switch ($List) {
                    case "Iedereen":
                        $Query = $this->Mailing->Mailing_Iedereen();
                        break;

                    case "VZW":
                        $Query = $this->Mailing->Mailing_VZW();
                        break;

                    case "Ouders":
                        $Query = $this->Mailing->Mailing_Ouders();
                        break;

                    case "Leiding":
                        $Query = $this->Mailing->Mailing_Leiding();
                        break;

                    case "Oudervergadering":
                        $Query = $this->Mailing->Mailing_Oudervergadering();
                        break;

                    default:
                        echo "Kan niet bepalen naar welke lijst hij de mails moet sturen ;-(";
                        die();
                }

                $text = $this->input->post('Message');

                // Mail message
                foreach ($Query as $Output) {
                    $this->email->set_mailtype("html");
                    $this->email->from('Mailing@st-joris-turnhout.be', 'Mailing st-joris turnhout');
                    $this->email->to($Output->Email);
                    $this->email->subject($this->input->post('subject'));
                    $this->email->message(Parsedown::instance()->parse($text)); // Pasedown???? Bug possible!
                    $this->email->send();
                    $this->email->clear();
                }

                redirect('Mailing');
            }
        } else {
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Voeg een email adress toe.
     * 
     * @return redirect
     */
    public function Add_address()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $this->Mailing->Insert_address();
                redirect('Mailing');
            }
        } else {
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Delete een email adres.
     * 
     * @return redirect.
     */
    public function Delete_address()
    {
        if ($this->Session) {
            if ($this->Session['admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $this->Mailing->Delete_address();
                redirect('Mailing');
            }
        } else {
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Set a user non active for the mailing. 
     * 
     * @return redirect
     */
    public function Inactief()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $this->Mailing->Inactief();
                redirect('Mailing');
            }
        } else {
            redirect('Admin', 'refresh');
        }
    }

    /**
     * Set the user active for the mailing. 
     *
     * @return redirect
     */
    public function Actief()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['admin'] == 1 || $this->Permissions['mailinglist'] == 'Y') {
                $this->Mailing->Actief();
                redirect('Mailing');
            }
        } else {
            redirect('Admin', 'refresh');
        }
    }
}
