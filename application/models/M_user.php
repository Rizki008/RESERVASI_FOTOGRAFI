<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->order_by('id_admin', 'desc');
        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('admin', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('admin', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->delete('admin', $data);
    }
}
