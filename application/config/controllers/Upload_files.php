<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Upload_files extends CI_Controller {
		// Constructor
		public $Session     = array();
        public $Permissions = array();
		public $Redirect    = array();

		function __construct() {
			parent::__construct();
			$this->load->helper(array('form', 'url', 'logger'));

			$this->Session     = $this->session->userdata('logged_in');
            $this->Permissions = $this->session->userdata('Permissions');

			$this->Redirect = $this->config->item('Redirect','Not_logged_in');
		}
		// END Constructor

		/**
		 * View voor het wijzigen van het groen'tje.
		 */
		public function index() {
			if($this->Session) {
				// Global Variables
				$Data = array(
					'Title'  => 'Wijzig groentje',
					'Active' => '9',
				);

				$this->load->view('components/admin_header', $Data);
				$this->load->view('components/navbar_admin', $Data);
				$this->load->view('admin/upload_planning', array('error' => ''));
				$this->load->view('components/footer');
			} else {
				// Geen sessie gevonden , ga naar login
				redirect($this->Redirect, 'Refresh');
			}
		}

		/**
		 * Upload het groentje naar the sercer.
		 */
		public function do_upload() {
			if($this->Session) {
				// Logging
				user_log('Server','Probeerd een nieuw groentje te uploaden.');

				$config = array(
					'upload_path'   => './assets/files/',
					'allowed_types' => 'pdf',
					'file_name'     => 'Planning',
					'overwrite'     => TRUE,
				);

				// Library word niet constructor geladen.
				// Omdat deze config variables bevat
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload()) {
					$Session = $this->session->userdata('logged_in');

					// Logging
					user_log('Server', 'Beep Beep! Ik kon het groentje niet uploaden.');

					// Global Variables
					$data = array(
						'Title'  => 'Wijzig groentje',
						'Active' => '9',
					);

					// Session Variables
					// Possible to delete. Need to research this.
					$data['id']    = $Session['id'];
					$data['Admin'] = $Session['Admin'];
					$data['User']  = $Session['username'];
					$data['Tak']   = $Session['Tak'];
					$data['Role']  = $Session['Admin'];
					$data['Theme'] = $Session['Theme'];

					// Error variable
					user_log('Server', 'Beep Beep! Ik kon het groentje uploaden.');
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('components/admin_header', $data);
					$this->load->view('components/navbar_admin', $data);
					$this->load->view('admin/upload_planning', $error);
					$this->load->view('components/footer');

				}	else {
						// Not in array because it is one variable.
						$Data['Heading'] = $this->Succes_heading;

						$this->load->view('alerts/upload_success', $Data);
					}
				} else {
					// If no session found, redirect to login
					redirect($this->Redirect, 'Refresh');
			}
		}
	}
