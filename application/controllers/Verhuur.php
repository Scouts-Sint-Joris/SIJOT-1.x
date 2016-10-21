<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Verhuur controller.
 *
 * @author Tim Joosten
 * @license: Closed license
 * @since 2015
 * @package Website
 *
 * @todo flash session toevoegen voor failed validation.
 */
class Verhuur extends CI_Controller
{
    public $Session     = array();
    public $Heading     = array();
    public $Flash       = array();
    public $Fields      = array();
    public $Redirect    = array();
    public $Permissions = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_verhuringen', 'Verhuringen');
        $this->load->model('Model_notifications', 'Not');

        $this->load->library(array('email', 'dompdf_gen', 'form_validation', 'pagination'));
        $this->load->helper(array('email', 'date', 'text', 'download'));

        $this->Session     = $this->session->userdata('logged_in');
        $this->Permissions = $this->session->userdata('Permissions');

        $this->Flash    = $this->session->flashdata('Message');
        $this->Fields   = $this->session->flashdata('Input');
        $this->Redirect = $this->config->item('Redirect', 'Not_logged_in');

        $this->Heading = "No permission";
        $this->Message = "U hebt geen rechten om deze handeling uit te voeren";
    }

    // End constructor

	/**
	 * Index page for the rental. 
	 * 
	 * [LINK]
	 */
    public function index()
    {
        $this->output->cache(5);
		
		$Data['Title']  = 'Verhuur';
		$Data['Active'] = 2;

        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/verhuur_index');
        $this->load->view('components/footer');
    }

    public function bereikbaarheid()
    {
        $data['Title']  = 'Bereikbaarheid';
        $data['Active'] = 2;

        $this->load->view('components/header', $data);
        $this->load->view('components/navbar', $data);
        $this->load->view('client/verhuur_bereikbaarheid', $data);
        $this->load->view('components/footer', $data);
    }

    /**
     * Generates the page for the calendar - Verhuur
	 *
	 * [LINK] 
     */
    public function verhuur_kalender()
    {

        $data = array(
            'Title' => 'Verhuur kalender',
            'Active' => '2',
        );

        // Database variables. Not an array because it's one item.
        $DB['Verhuringen'] = $this->Verhuringen->Verhuring_kalender4();

        $this->load->view('components/header', $data);
        $this->load->view('components/navbar', $data);
        $this->load->view('client/verhuur_kalender', $DB);
        $this->load->view('components/footer');
    }

    /**
     * controller voor verhuur aanvraag.
     */
    public function verhuur_aanvraag()
    {

        $data = array(
            'Title' => 'Aanvraag verhuur',
            'Active' => '2',
        );

        $this->load->view('components/header', $data);
        $this->load->view('components/navbar', $data);
        $this->load->view('client/verhuur_aanvraag');
        $this->load->view('components/footer');
    }


    /**
     * Voegt een verhuring toe aan de database en stuurt een mail naar de bevoegde personen.
	 * 
	 * TODO: Check for form validation 
	 * TODO: Check is input flash message is needed.
     */
    public function toevoegen_verhuur()
    {
        // Validation rules
        $this->form_validation->set_rules('Start_datum', 'Eind datum', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Eind_datum', 'Start Datum', 'trim|required|xss_clean');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $Flash = array(
                'Class' => 'alert alert-danger',
                'Heading' => 'Oh snapp!',
                'Message' => 'Uw verhuur aanvraag kon niet worden aangemaakt worden. Omdat een of meerdere vereiste velden niet zijn ingevult.'
            );

            $input = array(
                    'StartDatum' => $this->input->post('Start_datum'), 
                    'EindDatum'  => $this->input->post('Eind_datum'), 
                    'Email'      => $this->input->post('Email'),
                    'Groep'      => $this->input->post('Groep')
                );

			
			// Set Flash sessions.
            $this->session->set_flashdata('Input', $input);
            $this->session->set_flashdata('Message', $Flash);
			
            redirect('Verhuur/verhuur_aanvraag');
        } else {
            if ($this->Session) {
                $this->Verhuringen->InsertDB();

                // Logging
                //user_log($this->Session['username'], 'Heeft een verhuring toegevoegd.');
                redirect('Verhuur/Admin_verhuur');
            } else {
                $data = array(
                    // Email variables
                    'exec'  => $this->benchmark->elapsed_time(),
                    'Start' => $this->input->post('Start_datum'),
                    'Eind'  => $this->input->post('Eind_datum'),
                    'GSM'   => $this->input->post('GSM'),
                    'Groep' => $this->input->post('Groep'),
                    'Mail'  => $this->input->post('Email'),
                );

                $Mailing = $this->Not->Verhuur_mailing();

                foreach ($Mailing as $Output) {
                    $administrator = $this->load->view('email/verhuur', $data, TRUE);

                    $this->email->from('Verhuur@st-joris-turnhout.be', 'Contact st-joris turnhout');
                    $this->email->to($Output->Mail);
                    $this->email->bcc('Topairy@gmail.com');
                    $this->email->set_mailtype("html");
                    $this->email->subject('Nieuwe verhuring');
                    $this->email->message($administrator);
                    $this->email->send();
                    $this->email->clear();
                }

                // Start mail naar client
                $client = $this->load->view('email/verhuur_client-1', $data, TRUE);

                $this->email->set_mailtype("html");
                $this->email->from('Verhuur@st-joris-turnhout.be', 'Verhuur St-joris Turnhout');
                $this->email->bcc('Topairy@gmail.com');
                $this->email->to($this->input->post('Email'));
                $this->email->subject('Verhuur aanvraag - St-joris, Turnhout');
                $this->email->message($client);
                $this->email->send();

                // Debugging proposes
                // echo $this->email->print_debugger();

                // Schrijft naar database
                $this->Verhuringen->InsertDB();
                redirect('Verhuur');
            }
        }
    }

    // Admin side

    /**
     * Download de verhuringen in een PDF. 
	 *
	 * [LINK]
     */
    public function Download_verhuringen()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                // Not in array, because it is one variable.
                $Data['Query'] = $this->Verhuringen->Download_verhuringen();

                // Logging
                // user_log($this->Session['username'], 'Heeft de verhuringen gedownload.');

                $this->load->view('pdf/verhuur', $Data);
                $html = $this->output->get_output();

                // Convert to PDF
                $this->dompdf->set_paper('letter', 'landscape');
                $this->dompdf->load_html($html);
                $this->dompdf->render();
                $this->dompdf->stream("Onbijt_inschrijvingen.pdf");

            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // if no session, redirect to login page
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Zoekt in de database.
     */
    public function Search()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permission['verhuur'] == 'Y') {
                $Data = array(
                    // Global variables
                    'Title' => 'Verhuringen',
                    'Active' => '2',
                    'Notification' => $this->Not->Get(),
                    'Bevestigd' => $this->Verhuringen->Search(),
                );

                $this->load->view('components/admin_header', $Data);
                $this->load->view('components/navbar_admin', $Data);
                $this->load->view('admin/verhuur_index', $Data);
                $this->load->view('components/footer');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // if no session, redirect to login page
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     * Back-end paneel voor de verhuringen.
	 *
	 * TODO: Set pagination configuration to a separate config folder.
	 * TODO: Remove unused model instances.
	 *
	 * [LINK]: 
     */
    public function Admin_verhuur()
    {
        if ($this->Session && $this->Permissions) {
            $Data['Notification'] = $this->Not->Get();

            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 'Y') {
                // Gobal variables
                $Data = array(
                    'Title' => 'Verhuringen',
                    'Active' => '2',
                    'Bevestigd' => $this->Verhuringen->Verhuur_api(),
                    'Notification' => $this->Not->Get(),
                );

                // Pagination implmentation 
                $config             = array(); 
                $config['base_url']        = base_url() . "verhuur/admin_verhuur";
                $config["total_rows"]      = $this->Verhuringen->record_count();
                $config["per_page"]        = 20;
                $config["uri_segment"]     = 3;

                $config['full_tag_open']   = "<ul class='pagination'>";
                $config['full_tag_close']  = "</ul>";
                $config['num_tag_open']    = '<li>';
                $config['num_tag_close']   = '</li>';
                $config['cur_tag_open']    = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close']   = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open']   = "<li>";
                $config['next_tag_close']  = "</li>";
                $config['prev_tag_open']   = "<li>";
                $config['prev_tag_close']  = "</li>";
                $config['first_tag_open']  = "<li>";
                $config['first_tag_close'] = "</li>";
                $config['last_tag_open']   = "<li>";
                $config['last_tag_close']  = "</li>";

                $this->pagination->initialize($config);

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $Data["results"] = $this->Verhuringen->fetch_verhuur($config["per_page"], $page);
                $Data["links"] = $this->pagination->create_links();

                // End Pagination implmentation

                $this->load->view('components/admin_header', $Data);
                $this->load->view('components/navbar_admin', $Data);
                $this->load->view('admin/verhuur_index', $Data);
                $this->load->view('components/footer');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alerts', $Data);
            }
        } else {
            // If no session, redirect to login page
            redirect($this->Redirect, 'refresh');
        }
    }

    public function verhuur_edit()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 'Y') {
                $data = array(
                    'Title' => 'Wijzig verhuring',
                    'Active' => '2',
                    'Info' => $this->Verhuringen->verhuur_info(),
                );

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/Verhuur_edit', $data);
                $this->load->view('components/footer');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect($this->Redirect, 'refresh');
        }

    }

    /**
     * Haal de verhuur infmortie op.
     */
    public function verhuur_info()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 1) {
                $Data = array(
                    'Title' => 'Verhuur Info',
                    'Active' => '2',
                    'Info' => $this->Verhuringen->verhuur_info(),
                );

                $this->load->view('components/admin_header', $Data);
                $this->load->view('components/navbar_admin', $Data);
                $this->load->view('admin/verhuur_info', $Data);
                $this->load->view('components/footer');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     * Wijzig een verhuring.
     */
    public function Wijzig_verhuur()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 'Y') {
                $this->Verhuringen->Wijzig_verhuur();

                // Logging
               // user_log($this->Session['username'], 'Heeft een verhuring gewijzigd.');
                redirect('Verhuur/Admin_verhuur');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect($this->Redirect, 'Refresh');
        }
    }

    /**
     * Wijzig status naar optie
     */
    public function Change_optie()
    {
        if ($this->Session) {
            if ($this->Session['Admin'] == 1) {
                $this->Verhuringen->Status_optie();

                // Logging
                // user_log($this->Session['username'], 'Heeft de status gewijzigd naar optie.');
                redirect('Verhuur/Admin_verhuur');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Wijzig status naar bevestigd
     */
    public function Change_bevestigd()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 'Y') {
                $this->Verhuringen->Status_bevestigd();

                // Logging
               // user_log($this->Session['username'], 'heeft de status gewijzigd naar bevestigd.');

                redirect('Verhuur/Admin_verhuur');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect($this->Redirect, 'refresh');
        }
    }

    /**
     * Verwijderd een verhuring
     */
    public function Verhuur_delete()
    {
        if ($this->Session && $this->Permissions) {
            if ($this->Session['Admin'] == 1 || $this->Permissions['verhuur'] == 'Y') {
                $this->Verhuringen->Verhuur_delete();

                // Logging
                //user_log($this->Session['username'], 'Heeft een verhuring gewijzigd');
                redirect('Verhuur/Admin_verhuur');
            } else {
                $Data = array(
                    'Heading' => $this->Heading,
                    'Message' => $this->Message,
                );

                $this->load->view('errors/html/alert', $Data);
            }
        } else {
            // Geen sessie gevonden, ga naar login pagina
            redirect('Verhuur/Admin_verhuur');
        }
    }
}
