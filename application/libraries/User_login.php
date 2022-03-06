<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $cek = $this->ci->m_auth->login_user($email, $password);
        if ($cek) {
            $name = $cek->name;
            $email = $cek->email;
            $id_admin = $cek->id_admin;
            $level_user = $cek->level_user;

            //session
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('name', $name);
            $this->ci->session->set_userdata('id_admin', $id_admin);
            $this->ci->session->set_userdata('level_user', $level_user);
            if ($level_user == 1) {
                redirect('admin');
            } elseif ($level_user == 2) {
                redirect('pemilik');
            }
        } else {
            $this->ci->session->set_flashdata('error', 'email Atau Password Salah');
            redirect('auth/login_user');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login_user');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('name');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
        redirect('auth/login_user');
    }
}
