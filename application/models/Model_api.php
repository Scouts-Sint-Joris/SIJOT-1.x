<?php

class Model_api extends CI_Model
{

    public function getLogs()
    {
        $query = $this->db->get('ci_logs');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * @param  int , $id, The user id.
     * @return bool
     */
    public function getLogUser($id)
    {
        $this->db->select('*')->where('user_id', $id);
        $query = $this->db->get('ci_logs');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
