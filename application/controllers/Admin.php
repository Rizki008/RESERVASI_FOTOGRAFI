<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
            'isi' => 'v_admin'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Konfirmasi Pemesanan',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'isi' => 'layout/backend/transaksi/v_transaksi'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function followup()
    {
        $data = array(
            'title' => 'Konfirmasi Pemesanan',
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' => 'layout/backend/transaksi/v_followup'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function proses_pemotretan()
    {
        $data = array(
            'title' => 'Konfirmasi Pemesanan',
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'isi' => 'layout/backend/transaksi/v_proses_pemotretan'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function selesai_pemotretan()
    {
        $data = array(
            'title' => 'Konfirmasi Pemesanan',
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'layout/backend/transaksi/v_selesai_pemotretan'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function batal_pemotretan()
    {
        $data = array(
            'title' => 'Konfirmasi Pemesanan',
            'pesanan_dibatalkan' => $this->m_pesanan_masuk->pesanan_dibatalkan(),
            'isi' => 'layout/backend/transaksi/v_batal_pemotretan'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function proses($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'status_pesan' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('admin/pesanan_masuk');
    }

    public function batal($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'catatan' => $this->input->post('catatan'),
            'status_pesan' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Batalkan');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'followup' => $this->input->post('followup'),
            'followup_bayar' => $this->input->post('followup_bayar'),
            'status_pesan' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di FollowUp');
        redirect('admin/followup');
    }

    public function detail($no_pesan)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_pesan),
            'diproses_pesanan' => $this->m_pesanan_masuk->diproses_pesanan(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' =>  'layout/backend/transaksi/v_detail'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    public function pelanggan()
    {
        $data = array(
            'title' => 'Data Pelanggan',
            'data_pelanggan' => $this->m_admin->data_pelanggan(),
            'isi' => 'layout/backend/pelanggan/v_pelanggan'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }
}
