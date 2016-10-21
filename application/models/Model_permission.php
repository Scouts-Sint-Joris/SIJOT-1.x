<?php

class Model_permission extends CI_Model
{
    public function getUserRights()
    {
        $this->db->select('*')
            ->where('user_id', $this->uri->segment(3));

        $query = $this->db->get('Permissions');
        return $query->result();
    }

    /**
     * @param $values, array, the new rights.
     */
    public function updateUserRights()
    {
        $values = array(
            'mailinglist' => $this->input->post('mailinglist'),
            'verhuur'     => $this->input->post('verhuring'),
            'drive'       => $this->input->post('cloud'),
            'profiles'    => $this->input->post('profielen'),
        );

        $this->db->where('user_id', $this->uri->segment(3))
            ->update("Permissions", $values);
    }
}