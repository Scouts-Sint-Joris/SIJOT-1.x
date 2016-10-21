<?php

  Class Model_drive extends CI_Model {

    /**
     * Insert()
     *
     * Insert a file in the database.
     * @param $file, array, get the file information.
     */
    public function Insert($file = array()) {
      $data = array(
        'Naam'           => $this->input->post('Naam'),
        'file_name'      => $file['file_name'],
        'file_path'      => "/Drive/".$file['file_name'],
        'file_extension' => $file['file_ext'],
        'file_size'      => $file['file_size'],
      );

      $this->db->insert('Drive', $data);
    }


    /**
     * File()
     *
     * List all the files that stands in the database.
     */
    public function Files() {
      $Query = $this->db->get('Drive');
      return $Query->result();
    }

    /**
     * Delete()
     *
     * Deletes a file out of the database.
     */
    public function Delete() {
      $this->db->where('file_name', $this->uri->segment(3))
               ->delete('Drive');
    }
  }
