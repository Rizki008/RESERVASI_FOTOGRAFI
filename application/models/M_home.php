<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function produk()
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->where('stock>=1');
        $this->db->order_by('id_paket', 'desc');
        $this->db->limit(20);
        return $this->db->get()->result();
    }


    public function kategori_paket()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }


    public function total_followup()
    {
        $this->db->where('status_pesan=2');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get('pemesanan')->num_rows();
    }

    public function total_pesan()
    {
        $this->db->where('status_pesan=0');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get('pemesanan')->num_rows();
    }

    public function detail_paket($id_paket)
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->where('id_paket', $id_paket);

        return $this->db->get()->row();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function paket_all($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->where('paket.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }

    public function related_paket($id_paket)
    {
        return $this->db->where(array('id_paket !=' => $id_paket))->limit(4)->get('paket')->result();
    }

    public function reviews()
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        return $this->db->get()->result();
    }

    public function testimoni($nama)
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->join('tbl_pelanggan', 'testimoni.nama = tbl_pelanggan.nama', 'left');
        $this->db->where('nama', $nama);
        return $this->db->get()->result();
    }
}
