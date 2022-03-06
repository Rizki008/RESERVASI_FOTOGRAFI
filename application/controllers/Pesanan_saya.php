<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_paket');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pesanan saya',
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            'batalpesan' => $this->m_transaksi->batalpesan(),
            'isi' => 'layout/frontend/pesanan/v_pesanan_saya'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function bayar($id_pemesanan)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Isi Dengan Hurup !!!'
        ));
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Isi Dengan Hurup !!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "bukti_bayar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_transaksi->detail_pesanan($id_pemesanan),
                    'rekening' => $this->m_transaksi->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/frontend/pesanan/v_bayar'
                );
                $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pemesanan' => $id_pemesanan,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'bayar' => $this->input->post('bayar'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_transaksi->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
                redirect('pesanan_saya');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_transaksi->detail_pesanan($id_pemesanan),
            'rekening' => $this->m_transaksi->rekening(),
            'isi' => 'layout/frontend/pesanan/v_bayar'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function diterima($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'status_pesan' => 3
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
        redirect('pesanan_saya');
    }

    public function dibatalkan($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'status_pesan' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }

    public function batal($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'catatan_batal' => $this->input->post('catatan_batal'),
            'status_pesan' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }

    public function update_jadwal($id_pemesanan)
    {
        $data = array(
            'id_pemesanan' => $id_pemesanan,
            'tanggal_jadwal' => $this->input->post('tanggal_jadwal'),
            'status_pesan' => 0
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }

    //detail data order
    public function detail($no_pesan)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_pesan),
            'info' => $this->m_transaksi->info($no_pesan),
            'isi' =>  'layout/frontend/pesanan/v_detail_pesanan'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    //pemesanan selesai deteail & review produk
    public function detail_selesai($no_pesan)
    {
        $this->form_validation->set_rules('riview', 'Riviews', 'required', array('required' => '%s Mohon untuk Diisi!!!'));
        $this->form_validation->set_rules('name', 'Name', 'required', array('required' => '%s Mohon untuk Diisi!!!'));

        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_pesan),
            'riviews' => $this->m_transaksi->riviews($no_pesan),
            'isi' =>  'layout/frontend/riviews/v_riview'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }

    public function insert_riview()
    {
        $data['insert'] = $this->m_transaksi->insert_riview();
        $this->session->set_flashdata('pesan', 'Berhasil Memberi Riview');
        redirect('pesanan_saya');
    }
}
