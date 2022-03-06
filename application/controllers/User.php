<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_admin');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'layout/backend/user/v_user'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama user', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Diisi Dengan Alphabet'
        ));
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        $this->m_user->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
        redirect('user');
    }

    //Update one item
    public function edit($id_admin = NULL)
    {
        $this->form_validation->set_rules('name', 'Nama user', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Diisi Dengan Alphabet'
        ));
        $data = array(
            'id_admin' => $id_admin,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('user');
    }

    //Delete one item
    public function delete($id_admin = NULL)
    {
        $data = array('id_admin' => $id_admin);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('user');
    }
}

/* End of file User.php */
