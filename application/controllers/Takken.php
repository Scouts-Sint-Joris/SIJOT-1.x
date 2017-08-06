<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Takken controller
 *
 * @package Website
 * @copyright Tim Joosten
 * @since 2015
 */
class Takken extends CI_Controller
{
    // Constructor
    public $Session     = array();
    public $Permissions = array();
    public $Redirect    = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Takken', 'Takken');
        $this->load->model('Model_activiteiten', 'Activiteiten');

        $this->load->helper(array('text', 'xml'));

        $this->Session     = $this->session->userdata('logged_in');
        $this->Permissions = $this->session->userdata('Permissions');

        $this->Redirect = $this->config->item('Redirect', 'Not_logged_in');
    }
    // End constructor

    /**
     * Output: Takken pagina
     */
    public function index()
    {
        // Variable(s)
        // General
        $Data['Title']      = 'Takken';
        $Data['Active']     = '1';
        $Data['Limit']      = '40';
        $Data['Kapoenen']   = $this->Takken->Tak_info('Kapoenen');
        $Data['Welpen']     = $this->Takken->Tak_info('Welpen');
        $Data['JongGivers'] = $this->Takken->Tak_info('JongGivers');
        $Data['Givers']     = $this->Takken->Tak_info('Givers');
        $Data['Jins']       = $this->Takken->Tak_info('Jins');
        $Data['Leiding']    = $this->Takken->Tak_info('Leiding');
        // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/takken', $Data);
        $this->load->view('components/footer');
    }

    /**
     * Rss Feed controller
     */
    public function Feed()
    {
        $Data['feed_name']        = 'Activiteiten RSS feed';
        $Data['encoding']         = 'utf-8';
        $Data['feed_url']         = 'http://www.st-joris-turnhout.be/index.php/takken/Feed';
        $Data['page_description'] = 'RSS over de tak activiteiten';
        $Data['page_language']    = 'en-en';
        $Data['creator_email']    = 'webmaster@st-joris-turnhout.be';
        $Data['Activiteiten']     = $this->Activiteiten->Kapoenen(5);

        header("Content-Type: application/rss+xml");
        $this->load->view('client/rss', $Data);
    }

    /**
     * Output: Kapoenen pagina.
     */
    public function Kapoenen()
    {
        // Variable(s)
        // General
        $Data['Title']  = 'De Kapoenen';
        $Data['Active'] = '1';

        // Database
        $DB['Beschrijving'] = $this->Takken->Tak_info('Kapoenen');
        $DB['Activiteiten'] = $this->Activiteiten->Activiteiten('5', 'Kapoenen');
        // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }


    /**
     * Outputs Welpen page.
     */
    public function Welpen()
    {
        $Data['Title']  = 'De Welpen';
        $Data['Active'] = '1';

        // Database
        $DB['Beschrijving'] = $this->Takken->tak_info('Welpen');
        $DB['Activiteiten'] = $this->Activiteiten->Activiteiten('5', 'Welpen');
        // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function JongGivers()
    {
        // Variable(s)
        // General
        $Data['Title']  = 'De Jong-Givers';
        $Data['Active'] = '1';

        // Database
        $DB['Beschrijving'] = $this->Takken->Tak_info('JongGivers');
        $DB['Activiteiten'] = $this->Activiteiten->Activiteiten('5', 'JongGivers');
        // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    /**
     * Output: Givers pagina
     */
    public function Givers()
    {
        // Variable(s)
        // General
        $Data['title']  = 'De Givers';
        $Data['Active'] = '1';

        // Database
        $DB['Beschrijving'] = $this->Takken->Tak_info('Givers');
        $DB['Activiteiten'] = $this->Activiteiten->Activiteiten('5', 'Givers');
        // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    /**
     * Output: Jins pagina.
     */
    public function Jins()
    {
        $Data['Title']  = 'De Jins';
        $Data['Active'] = '1';

        $DB['Beschrijving'] = $this->Takken->Tak_info('Jins');
        $DB['Activiteiten'] = $this->Activiteiten->Activiteiten('5', 'Jins');

        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    /**
     * Output: Leiding pagina.
     */
    public function Leiding()
    {
        $Data['Title']        = 'De Leiding';
        $Data['Active']       = '1';
        $Data['Beschrijving'] = $this->Takken->Tak_info('Leiding');

        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_leiding', $Data);
        $this->load->view('components/footer');
    }

    // Admin controllers
    public function Takken_edit()
    {
        if ($this->Session) {
            $this->load->model('Model_takken', 'Takken');
            $this->Takken->Takken_edit();
            redirect('backend', 'refresh');
        } else {
            // If no session found redirect to login
            redirect($this->Redirect, 'refresh');
        }
    }
}
