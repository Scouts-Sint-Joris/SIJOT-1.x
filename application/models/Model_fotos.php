<?php

/**
 *
 */
Class Model_fotos extends CI_Model
{

    /**
     *
     */
    public function Select()
    {
        $this->db->select()
            ->limit(9);

        $Query = $this->db->get('Photo_Gallery');
        return $Query->result();
    }

    /**
     * get photos based on the tak
     */
    public function Select_tak()
    {
        $this->db->select()
            ->where('Tak', $this->uri->segment(3));

        $Query = $this->db->get('Photo_Gallery');
        return $Query->Result();
    }

    /**
     * Insert a photo
     */
    public function Insert($image_data = array())
    {
        $Values = array(
            "Naam"       => $this->input->post('Naam'),
            "Tak"        => $this->input->post('Tak'),
            "Web_url"    => $this->input->post('URL'),
            "File_path"  => "/assets/fotos/" . $image_data['file_name'],
            "File_name"  => $image_data['file_name'],
        );

        $this->db->insert('Photo_Gallery', $Values);
        return $this->db->affected_rows();
    }

    /**
     * Haal de albums op
     */
    public function Backend_select()
    {
        $this->db->select()
            ->limit(25);

        $Query = $this->db->get('Photo_Gallery');
        return $Query->result();
    }

    /**
     * Deletes a photo in the database
     */
    public function Delete()
    {
        $this->db->where('File_name', $this->uri->segment(3))
            ->delete('Photo_Gallery');
    }
}
