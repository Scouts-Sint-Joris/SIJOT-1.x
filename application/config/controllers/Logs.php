<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Logs extends CI_Controller {
		public $Session = array();

		function __construct() {
			parent::__construct();
			$this->Session = $this->session->userdata('logged_in');
			$this->load->model('Model_log_user', 'Logs');
		}

		/**
		 * Geef alle logs van vandaag weer.
		 */
		public function index() {
			if($this->Session['Admin'] == 1) {
				$Data = array(
					'Title'  => 'Logs',
					'Active' => '58',
					'Logs'   =>  $this->Logs->Get(),
				);

				$this->load->view('components/admin_header', $Data);
				$this->load->view('components/navbar_admin', $Data);
				$this->load->view('admin/Logs', $Data);
				$this->load->view('components/footer');
			} else {
				redirect('Admin');
			}
		}

		/**
		 * Zoek naar logs
		 */
		public function Search() {
			if($this->Session['Admin'] == 1) {
				$Data = array(
					'Title'  => 'Logs',
					'Active' => '58',
					'Logs'   => $this->Logs->Search(),
				);

				$this->load->view('components/admin_header', $Data);
				$this->load->view('components/navbar_admin', $Data);
				$this->load->view('admin/Logs', $Data);
				$this->load->view('components/footer');
			} else {
				redirect('Admin');
			}
		}
	}
