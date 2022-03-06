<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_paket');
        $this->load->model('m_admin');
        $this->load->model('m_transaksi');
        $this->load->model('m_home');
    }
    public function index()
    {
        $data = array(
            'title' => 'Katalog',
            'paket' => $this->m_paket->paket(),
            'reviews' => $this->m_home->reviews(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function detail_paket($id_paket)
    {
        $data = array(
            'title' => 'Detail Paket',
            // 'gambar' => $this->m_home->gambar_paket($id_paket),
            'paket' => $this->m_home->detail_paket($id_paket),
            'related_paket' => $this->m_home->related_paket($id_paket),
            // 'reviews' => $this->m_home->reviews($id_paket),
            'isi' => 'layout/frontend/detail/v_detail'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function riviews($id_pemesanan)
    {
        $data = array(
            'title' => 'Testimoni',
            'reviews' => $this->m_home->reviews($id_pemesanan),
            'isi' => 'layout/frontend/testimoni/v_testimoni'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => $kategori->nama_kategori,
            'paket' => $this->m_home->paket_all($id_kategori),
            'isi' => 'layout/frontend/kategori/v_kategori'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }
}
