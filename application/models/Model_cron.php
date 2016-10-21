<?php

	/**
 	 * Model for cron jobs.
	 *
   * @author Tim Joosten
 	 * @license: Closed license
	 * @since 2015
	 * @package Website-models
	 */

	Class Model_cron extends CI_Model {

		/**
		 * Optimaliseer databases
		 */
		public function Optimize() {
			// DButil word geladen in controller
			$this->dbutil->optimize_database();
		}

		/**
		 * Verwijder afgelopen verhuringen
		 */
		public function Del_verhuringen() {
			$this->db->query('DELETE FROM Verhuur WHERE Eind_datum < UNIX_TIMESTAMP(NOW())');
			return $this->db->affected_rows();
		}

		/**
	 	 * Verwijder activiteiten die afgelopen zijn
	 	 */
		public function Del_activiteiten() {
		 	$this->db->query('DELETE FROM Activiteiten WHERE Datum < UNIX_TIMESTAMP(NOW())');
		 	return $this->db->affected_rows();
		}
	}
