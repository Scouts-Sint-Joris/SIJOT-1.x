<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * @author: Tim Joosten
	 * @copyright: Closed License, Tim Joosten
	 * @package: Scouts website (http://www.st-joris-turnhout.be)
	 */

	class Drive extends CI_Controller {
		public $Session     = array();
		public $Permissions = array();
		public $Flash       = array();

		function __construct() {
			parent::__construct();
			$this->Session     = $this->session->userdata('logged_in');
			$this->Permissions = $this->session->userdata('Permissions');

			$this->Flash   = $this->session->flashdata('Message');

			$this->load->helper(array('form', 'download'));
			$this->load->model('Model_drive', 'Drive');
		}

		/**
		 * Scouts - drive interface
		 */
		public function index() {
			if($this->Session && $this->Permissions['drive'] === 'Y') {
				$Data = array(
					'Title'  => 'St-Joris Cloud',
					'Active' => '1',
					'Files'  => $this->Drive->Files(),
				);

				$this->load->view('components/admin_header', $Data);
				$this->load->view('components/navbar_admin', $Data);
				$this->load->view('admin/drive', $Data);
				$this->load->view('components/footer');
			} else {
				redirect('Admin');
			}
		}


		/**
		 * Upload files.
		 */
		public function Upload() {
			if($this->session && $this->Permissions['drive'] === 'Y') {
				
				$config = array(
					'upload_path' => './Drive/',
					'allowed_types' => 'pdf|docx|jpg|jpeg|png|gif|txt',
				);

				// Library word niet constructor geladen.
				// Omdat deze config variables bevat
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {
					$Flash = array(
						'Class'   => 'alert alert-danger',
						'Heading' => 'Ohh snap!',
						'Info'    => 'er is iets misgelopen. U kunt uw bestand niet uploaden naar de Drive.',
					);

					$this->session->set_flashdata('Message', $Flash);

					// For debugging proposes
					// echo $this->upload->display_errors();

					redirect($_SERVER['HTTP_REFERER']);
				}	else {
					$this->Drive->Insert($this->upload->data());

					$Flash = array(
						'Class'   => 'alert alert-success',
						'Heading' => 'Success!',
						'Info'    => 'Uw bestand is successvol geupload naar de drive.',
					);

					$this->session->set_flashdata('Message', $Flash);
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				redirect('Admin');
			}
		}

		/**
		 * Functie voor het downloaden van een bestand uit de drive.
		 */
		public function Download() {
			if($this->Session && $this->Permissions['drive'] == 'Y') {
				$name = $this->uri->segment(3);
				$data = file_get_contents('./Drive/'. $name);
				force_download($name, $data);
			} else {
				redirect('Admin');
			}
		}

		/**
		 * Functie voor het verwijderen van een file uit de drive.
		 */
		public function Delete($file) {
			if($this->Session && $this->Permissions['drive'] == 'Y') {
				user_log($this->Session['username'], 'Heeft een bestand verwijderd');

				if(file_exists('./Drive/'. $file)) {
					// If the file exists
					$this->Drive->Delete();
					
					if (! unlink('./Drive/'. $file)) {
						$this->Drive->Delete();

						// Failure
						$Flash = array(
							'Class'   => 'alert alert-success',
							'Heading' => 'Success!',
							'Info'    => 'De file kon niet worden verwijderd.',
						);

						$this->session->set_flashdata('Message', $Flash);
						redirect($_SERVER['HTTP_REFERER']);
					} else {
						// Success
						$Flash = array(
							'Class'   => 'alert alert-success',
							'Heading' => 'Oh snapp!',
							'Info'    => 'De file is successvol verwijderd.',
						);

						$this->session->set_flashdata('Message', $Flash);
						redirect($_SERVER['HTTP_REFERER']);
					}
				} else {
					// If the file not exists
					$this->Drive->Delete();

					$Flash = array(
							'Class'   => 'alert alert-danger',
							'Heading' => 'Ohh snap!',
							'Info'    => 'De file kon niet worden gevonden op de server.',
					);

					$this->session->set_flashdata('Message', $Flash);
					redirect($_SERVER['HTTP_REFERER']);
				}
		} else {
			// If no session found.
			redirect('Admin');
		}
	}
}
