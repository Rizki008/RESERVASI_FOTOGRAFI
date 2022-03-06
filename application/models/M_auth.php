<?php
defined('BASEPATH') or exit('No direct script access allowes');

class M_auth extends CI_Model
{
    public function login_user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }

    public function login_pelanggan($email, $password)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
            'email' => $email,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}
