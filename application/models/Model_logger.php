<?php

Class Model_logger extends CI_Model
{
    public function Insert($Filepath)
    {
        $Values = array(
            'Date'     => date("Y/m/d"),
            'Month'    => date('m'),
            'Log_file' => $Filepath,
        );

        $this->db->insert('Log_archive', $Values);
    }

    public function Get()
    {
        $this->db->select('*')
            ->where('Month', date('m'))
            ->from('Log_archive');

        $Query = $this->db->get();
        return $Query->result();
    }
}
