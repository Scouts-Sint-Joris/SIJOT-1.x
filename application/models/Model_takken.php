<?php

 /**
  * Model takken.
  *
  * @author Tim Joosten
  * @license: Closed license
  * @since 2015
  * @package Website-models
  */

	Class Model_Takken extends CI_Model {

		/**
		 * Tak_info()
		 *
		 * @param $param, string, de tak waarvan je de info wilt.
		 * @return string, array
		 */
		public function Tak_info($Param)
		{
			$this->db->select()
					 ->where('Tak', $Param);

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Wijzig een tak beschrijving
		 */
		public function Takken_edit()
		{
			$Values = array(
				"Beschrijving" => $this->input->post('Beschrijving'),
				"Title"        => $this->input->post('Title'),
				"Sub_title"    => $this->input->post('Sub_title'),
				);

			$this->db->where('ID', $this->uri->segment(3))
			         ->update('Takken', $Values);
		}
	}
