<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }
}
