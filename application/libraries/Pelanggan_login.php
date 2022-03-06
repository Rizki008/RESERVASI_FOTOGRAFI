<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_pelanggan($email, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $name = $cek->name;
            $email = $cek->email;
            $no_tpln = $cek->no_tpln;

            //session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('name', $name);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('no_tpln', $no_tpln);

            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', 'email Atau Password Salah');
            redirect('pelanggan/login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('name') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('name');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->set_userdata('no_tpln');
        $this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
        redirect('pelanggan/login');
    }
}
