<?php

class Model_session extends CI_Model
{
    public function deleteSession($identity)
    {
        // delete any existing sessions with the current userid session.
        // Note - a new session has already been generated but doesn't have a value
        // in the userid column, so won't get deleted.
        $this->db->delete('ci_sessions', array('userid' => $identity));
    }

    public function setUserId($identity)
    {
        $data       = array('userid' => $identity['id']);
        $session_id = $this->session->userdata('session_id');

        $this->db->where("session_id", $session_id)
            ->update("ci_sessions", $data);
    }
}