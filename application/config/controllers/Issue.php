<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Issue reporter (Webplatfrom => GitHub)
 *
 * @author Tim Joosten
 * @copyright Closed License, Tim Joosten
 * @package Website
 */
class Issue extends CI_Controller
{
    public $Session     = array();
    public $Permissions = array();

    /**
     * Constructor for Issues.
     */
    public function __construct()
    {
        parent::__construct();
        $this->Permissions = $this->session->userdata('Permissions');
        $this->Session     = $this->session->userdata('logged_in');

        $this->load->library(array('email'));
        $this->load->helper(array('logger'));
    }

    /**
     * Formulier melden van een Probleem.
     */
    public function Index()
    {
        if ($this->Session) {
            $Data = array(
                'Title' => 'Rapporteer een fout!',
                'Active' => '145',
            );

            $this->load->view('components/admin_header', $Data);
            $this->load->view('components/navbar_admin');
            $this->load->view('admin/issue');
            $this->load->view('components/footer');
        } else {
            redirect($this->config->item('Redirect', 'Not_logged_in'));
        }
    }

    public function Report()
    {
        // Logging
        log_user($this->Session['username'], 'Heeft een bug gemeld.');

        // Send error
        $this->email->from('tjoosten3@gmail.com', 'Tim Joosten');
        $this->email->to('topairy@gmail.com');

        $this->email->subject($this->input->post('Title'));
        $this->email->message($this->input->post('Body'));

        $this->email->send();

        // For debugging proposes
        // echo $this->email->print_debugger();
    }
}
