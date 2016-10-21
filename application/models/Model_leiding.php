<?php

class Model_leiding extends CI_Model
{

    /*
     | Developer: Tim Joosten
     | Licence: 4GPL
     | Copyright: Sint-Joris Turnhout, Tim Joosten
     */

    public function ploeg()
    {
        $this->db->select()
            ->where_not_in('Tak', '6');

        $Query = $this->db->get('users');
        return $Query->result();
    }

    public function Leiding_insert($Mail)
    {
        $Values = array(
            "username" => $this->input->post('Naam'),
            "Mail" => $this->input->post('Mail'),
            "GSM" => $this->input->post('GSM'),
            "Tak" => $this->input->post('Tak'),
            "Admin_role" => "0",
            "Blocked" => "0",
            "Theme" => "0",
            "password" => md5($Mail['Pass']),
        );

        $this->db->insert('users', $Values);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function insert_permission($id)
    {
        $values['user_id'] = $id;

        $this->db->insert('Permissions', $values);
    }

    public function delete_permissions($id)
    {
        $this->db->where('user_id', $id)
            ->delete('Permissions');
    }

    public function Administrators()
    {
        $this->db->select()
            ->where('Admin_role', '1');

        $Query = $this->db->get('users');
        return $Query->result();
    }

    public function Leiding()
    {
        $this->db->select()
            ->where_not_in('Tak', '6');

        $Query = $this->db->get('users');
        return $Query->result();
    }

    public function Account()
    {
        $this->db->select()
            ->where('username', $this->uri->segment(3));

        $Query = $this->db->get('users');
        return $Query->result();
    }

    public function Settings_edit()
    {
        $Pass = $this->input->post('Pass');

        if (! empty($Pass)) {
            $Values = array(
                "Mail"     => $this->input->post('Email'),
                "GSM"      => $this->input->post('GSM'),
                "password" => md5($this->input->post('Pass')),
                "Theme"    => $this->input->post('Theme'),
            );
        } else {
            $Values = array(
                "Mail" => $this->input->post('Email'),
                "GSM" => $this->input->post('GSM'),
                "Theme" => $this->input->post('Theme'),
            );
        }

        $this->db->where('id', $this->uri->segment(3))
            ->update("users", $Values);
    }

    public function Leiding_Block()
    {
        $Value = array(
            "Blocked" => "1",
        );

        $this->db->where("id", $this->uri->segment(3))
            ->update("users", $Value);
    }

    public function Leiding_Unblock()
    {
        $Value = array(
            "Blocked" => "0",
        );

        $this->db->where('id', $this->uri->segment(3))
            ->update("users", $Value);
    }

    public function Get_user()
    {
        $this->db->select()
            ->where('ID', $this->uri->segment(3));

        $Query = $this->db->get('users');
        return $Query->result();
    }

    public function Leiding_upgrade($Mailing)
    {
        $Session = $this->session->userdata('logged_in');

        $Value = array(
            "Admin_role" => "1",
        );

        $this->db->where("id", $this->uri->segment(3))
            ->update("users", $Value);

        $Values = array(
            "Naam" => $Mailing['Naam'],
            "Mail" => $Mailing['Email'],
            "Verhuur" => "1",
        );

        $this->db->insert('Notifications', $Values);

    }

    public function Leiding_downgrade($Mailing)
    {
        $Value = array(
            "Admin_role" => "0",
        );

        $this->db->where("id", $this->uri->segment(3))
            ->update("users", $Value);

        $this->db->where('Mail', $Mailing['Naam'])
            ->delete('users');
    }

    public function Leiding_delete()
    {
        $this->db->where('id', $this->uri->segment(3))
            ->delete('users');
    }
}
