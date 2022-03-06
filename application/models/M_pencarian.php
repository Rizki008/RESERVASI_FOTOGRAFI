<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pencarian extends CI_Model
{

    public function ambil_data($data = null)
    {
        $this->db->select('*');
        $this->db->from('paket');
        if (!empty($data)) {
            $this->db->like('nama_paket', $data);
        }
        $this->db->join('kategori', 'paket.id_kategori = kategori.id_kategori', 'left');

        $this->db->order_by('id_paket', 'desc');
        return $this->db->get()->result();
    }
}
