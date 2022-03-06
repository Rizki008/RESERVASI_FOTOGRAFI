<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
        $this->load->model('m_paket');

        $this->load->library('session');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_paket' => $this->m_admin->total_paket(),
            'total_pembayaran' => $this->m_admin->total_pembayaran(),
            'total_selesai' => $this->m_admin->total_selesai(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'isi' => 'v_pemilik'
        );
        $this->load->view('layout/pemilik/v_wrapper', $data, FALSE);
    }
}
