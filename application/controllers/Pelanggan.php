<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_register');
        $this->load->model('m_auth');
    }

    // List all your items
    public function register()
    {
        $this->form_validation->set_rules('name', 'Nama Pelanggan', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Inputkan Hurup!!!'
        ));
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telpon', 'required|numeric|min_length[11]|max_length[13]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'min_length' => '%s Minimal 11 angka !!!',
            'max_length' => '%s Maksimal 13 angka !!!',
            'numeric' => '%s Mohon Inputkan Angka !!!'
        ));
        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|is_unique[pelanggan.email]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'is_unique' => '%s Email Sudah Terdaptar'
        ));
        $this->form_validation->set_rules('password', 'Password Pelanggan', 'required|min_length[8]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'min_length' => '%s Minimal 8 karakter !!!'
        ));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'matches' => '%s Password Tidak Sama !!!'
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Regiseter Pelanggan',
                'isi' => 'layout/frontend/register/v_register'
            );
            $this->load->view('layout/frontend/register/v_register');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_register->register($data);
            $this->session->set_flashdata('pesan', 'Register Berhasil, Silahkan Untuk Login!!!');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'layout/frontend/login/v_login_pelanggan'
        );
        $this->load->view('layout/frontend/login/v_login_pelanggan', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }
}

/* End of file Pelanggan.php */
