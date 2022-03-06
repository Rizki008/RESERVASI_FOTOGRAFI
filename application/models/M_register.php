<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_register extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('pelanggan', $data);
    }
}
