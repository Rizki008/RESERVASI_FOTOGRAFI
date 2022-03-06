<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_paket()
    {
        return $this->db->get('paket')->num_rows();
    }

    public function total_pembayaran()
    {
        $this->db->where('status_pesan=0');
        return $this->db->get('pemesanan')->num_rows();
    }
    public function total_followup()
    {
        $this->db->where('status_pesan=1');
        return $this->db->get('pemesanan')->num_rows();
    }
    public function total_roses()
    {
        $this->db->where('status_pesan=2');
        return $this->db->get('pemesanan')->num_rows();
    }

    public function total_pelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function total_selesai()
    {
        $this->db->where('status_pesan=3');
        return $this->db->get('pemesanan')->num_rows();
    }
    public function total_batal()
    {
        $this->db->where('status_pesan=4');
        return $this->db->get('pemesanan')->num_rows();
    }

    public function grafik()
    {
        $this->db->select('*');
        return $this->db->get('pemesanan')->result();
    }

    public function data_followup()
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('pembayaran', 'paket.id_produk=pembayaran.id_produk', 'left');
        $this->db->where('stock <=100');
        $this->db->order_by('stock', 'desc');
        return $this->db->get()->result();
    }

    public function data_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }
}
