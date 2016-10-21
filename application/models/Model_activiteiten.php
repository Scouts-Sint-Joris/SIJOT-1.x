<?php

Class Model_activiteiten extends CI_Model
{
    /*
     | Developer: Tim Joosten
     | License: 4GPL
     | Copyright: Sint-Joris Turnhout, Tim Joosten
     */
    public function Activiteiten()
    {
        $Query = $this->db->get('Activiteiten');
        return $Query->result();

    }

    public function Kapoenen()
    {
        $this->db->select()
            ->where('Tak', 'Kapoenen')
            ->limit(5);

        $Query = $this->db->get('Activiteiten');
        return $Query->result();
    }

    public function Welpen()
    {
        $this->db->select()
            ->where('Tak', 'Welpen')
            ->limit(5);

        $Query = $this->db->get('Activiteiten');
        return $Query->result();
    }

    public function JongGivers()
    {
        $this->db->select()
            ->where('Tak', 'JongGivers')
            ->limit(5);

        $Query = $this->db->get('Activiteiten');
        return $Query->result();
    }

    public function Givers()
    {
        $this->db->select()
            ->where('Tak', 'Givers')
            ->limit(5);

        $Query = $this->db->get('Activiteiten');
        return $Query->result();
    }

    public function Jins()
    {
        $this->db->select()
            ->where('Tak', 'Jins')
            ->limit(5);

        $Query = $this->db->get('Activiteiten');
        return $Query->result();
    }

    public function Insert()
    {
        // Replace characters that can jam the timestamp
        $old_sep = array("/", "-");
        $new_sep = ".";

        // Values
        $Datum = str_replace($old_sep, $new_sep, $this->input->post('Datum'));

        $Values = array(
            "Tak" => $this->uri->segment(3),
            "Datum" => $Datum,
            "Naam" => $this->input->post('Naam'),
            "Beschrijving" => $this->input->post('Beschrijving'),
        );

        $this->db->insert('Activiteiten', $Values);
        return $this->db->affected_rows();
    }
}