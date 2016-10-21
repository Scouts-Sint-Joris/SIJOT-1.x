<?php

/*
 * Developer: Tim Joosten
 * License: 4GPL
 * Copyright: Sint-Joris Turnhout, Tim Joosten
 */

Class Model_log extends CI_Model
{
    public $Session = array();

    public function __construct()
    {
        parent::__construct();
        $this->Session = $this->session->userdata('logged_in');
    }

    public function getUserLogs()
    {
        $this->db->select('*')
            ->where('user_id', $this->uri->segment(3));

        $query = $this->db->get('ci_logs');
        return $query->result();
    }

    public function logged_in()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "user_id"   => $Session['id'],
            "log_message"   => "Heeft zich ingelogd",
            "date"     => time(),
        );

        $this->db->insert('ci_logs', $Values);
    }

    public function Logged_out()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft zich uitgelogd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Created_login()
    {

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een login toegegevoegd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Delete_login()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "user_id"     => $Session['id'],
            "log_message" => "Heeft een login verwijderd",
            "Date"        => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Add_admin()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['id'],
            "Bericht"   => "Heeft iemand administrator gemaakt",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Delete_admin()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['id'],
            "Bericht"   => "Heeft iemand verwijderd als administrator",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function block()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een login geblokkeerd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Log_unblock()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een login vrijgegeven",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Make_user()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een login aangemaakt",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Verhuur_option()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft de optie van een verhuring aangepast",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Verhuur_delete()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een verhuring verwijderd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Verhuur_insert()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft een verhuring toegevoegd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }

    public function Verhuur_wijzig()
    {
        $Session = $this->session->userdata('logged_in');

        $Values = array(
            "Gebruiker" => $Session['username'],
            "Bericht"   => "Heeft de data van een verhuring gewijzigd",
            "Datum"     => time(),
        );

        $this->db->insert('Activity_log', $Values);
    }
}
