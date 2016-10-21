<?php

Class Model_inschrijvingen extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Get_dates()
    {
        $this->db->select('*')
            ->where('Status', '1');

        $Query = $this->db->get('Ontbijt_datums');
        return $Query->Result();
    }

    public function Get_Dates_Full()
    {
        $Query = $this->db->get('Ontbijt_datums');
        return $Query->result();
    }

    public function Download()
    {
        $Query = $this->db->get('Inschrijvingen_ontbijt');
        return $Query->result();
    }

    /**
     *
     */
    public function Download_month()
    {
        $this->db->select()
            ->where('Maand', $this->uri->segment(4));

        $Query = $this->db->get('Inschrijvingen_ontbijt');
        return $Query->result();
    }

    /**
     * Start inschrijvingen in de database
     */
    public function startInschrijvingOntbijt()
    {
        $Value = array(
            "Status" => "1",
        );

        $this->db->where('ID', $this->uri->segment(3))
            ->update('Ontbijt_datums', $Value);
    }

    /**
     * Stop inschrijvingen in de database
     */
    public function Stop_inschrijving_ontbijt()
    {
        $Value = array(
            "Status" => "0",
        );

        $this->db->where('ID', $this->uri->segment(3))
            ->update('Ontbijt_datums', $Value);
    }

    /**
     * Neem alle inschrijvingen uit de database.
     */
    public function Inschrijvingen_All()
    {
        $this->db->select();

        $Query = $this->db->get('Inschrijvingen_ontbijt');
        return $Query->result();
    }

    /**
     * Inschrijving invoegen in de database.
     */
    public function insertDb()
    {
        // Calculate bedrag
        $Aantal = $this->input->post('Personen');
        $Prijs = "3";
        $Bedrag = $Aantal * $Prijs;

        $Values = array(
            "Naam"            => $this->input->post('Naam'),
            "Voornaam"        => $this->input->post('Voornaam'),
            "Email"           => $this->input->post('Email'),
            "Maand"           => $this->input->post('Maand'),
            "Aantal_Personen" => $this->input->post('Personen'),
            "Te_betalen"      => $Bedrag,
        );

        $this->db->insert('Inschrijvingen_ontbijt', $Values);
    }

    /**
     *
     */
    public function deleteDb()
    {

    }
}
