<?php

	/**
	 * Model for Notifications.
	 *
	 * @author Tim Joosten
	 * @license: Closed license
	 * @since 2015
	 * @package Website-models
	 */

	Class Model_notifications extends CI_Model {
		// Constructor
		public $Auth = array();

		public function __construct() {
			parent::__construct();
			$this->Auth = $this->session->userdata('logged_in');
		}
		// End constructor

		/**
		 * Repair notification in the database - Verhuur
		 */
		public function Herstel_verhuur($Person) {
			$Values = array(
				"Naam"    => $Person['Naam'],
				"Mail"    => $Person['Email'],
				"Verhuur" => "0"
				);

			$this->db->insert('Notifications', $Values);
		}

		/**
		 * Blaat
		 */
		public function Get() {
			$this->db->select('Verhuur')
			         ->where('Naam', $this->Auth['username']);

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}

		/**
		 * Enable notification in the database
		 */
		public function Verhuur_aan() {
			$Values = array(
				"Verhuur" => "1",
				);

			$this->db->where('Naam', $this->Auth['username'])
					 ->update('Notifications', $Values);
		}

		/**
		 * Disables notification in the database.
		 */
		public function Verhuur_uit() {
			$Values = array(
				"Verhuur" => "0",
				);

			$this->db->where('Naam', $this->Auth['username'])
					 ->update('Notifications', $Values);
		}

		/**
		 * Gets the email adresses for mailing - verhuur
		 */
		public function Verhuur_mailing() {
			$this->db->select()
			         ->where('Verhuur','1');

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}
	}
