<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencarian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pencarian');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        //$data = $this->m_pencarian->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'pencarian' => $this->m_pencarian->ambil_data($keyword),
            'isi'        => 'layout/frontend/pencarian/v_pencarian'
        );
        $this->load->view('layout/frontend/v_wrapper', $data, FALSE);
    }
}
