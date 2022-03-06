<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_paket extends CI_Model
{

    public function paket()
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->order_by('id_paket', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_paket)
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->where('id_paket', $id_paket);
        return $this->db->get()->row();
    }

    // Add a new item
    public function add($data)
    {
        $this->db->insert('paket', $data);
    }

    //Update one item
    public function edit($data)
    {
        $this->db->where('id_paket', $data['id_paket']);
        $this->db->update('paket', $data);
    }

    //Delete one item
    public function delete($data)
    {
        $this->db->where('id_paket', $data['id_paket']);
        $this->db->delete('paket', $data);
    }
}

/* End of file M_barang.php */
