<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_paket');
        $this->load->model('m_kategori');
        $this->load->model('m_admin');
    }
    public function index()
    {
        $data = array(
            'title' => 'Data Paket',
            'paket' => $this->m_paket->paket(),
            'isi' => 'layout/backend/paket/v_paket'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }


    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Diisi Dengan Alphabet'
        ));
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga paket', 'required|numeric', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'numeric' => '%s Mohon Untuk Diisi Dengan Angka!!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga paket', 'numeric', array(
            'numeric' => '%s Mohon Untuk Diisi Dengan Angka!!!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ketentuan', 'ketentuan paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah paket',
                    'kategori' => $this->m_kategori->kategori(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backend/paket/v_add'
                );
                $this->load->view('layout/backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_paket' => $this->input->post('nama_paket'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'diskon' => $this->input->post('diskon'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'ketentuan' => $this->input->post('ketentuan'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_paket->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('paket');
            }
        }

        $data = array(
            'title' => 'Tambah paket',
            'kategori' => $this->m_kategori->kategori(),
            'isi' => 'layout/backend/paket/v_add'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    //Edit one item
    public function edit($id_paket = NULL)
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required|regex_match[/^([a-zA-Z]|\s)+$/]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'regex_match' => '%s Mohon Diisi Dengan Alphabet'
        ));
        $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('harga', 'Harga paket', 'required|numeric', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'numeric' => '%s Mohon Untuk Diisi Dengan Angka!!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga paket', 'numeric', array(
            'numeric' => '%s Mohon Untuk Diisi Dengan Angka!!!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('ketentuan', 'ketentuan paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '7000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit paket',
                    'kategori' => $this->m_kategori->kategori(),
                    'paket' => $this->m_paket->detail($id_paket),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'layout/backend/paket/v_edit'
                );
                $this->load->view('layout/backend/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar di folder
                $paket = $this->m_paket->detail($id_paket);
                if ($paket->gambar !== "") {
                    unlink('./assets/gambar/' . $paket->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_paket' => $id_paket,
                    'nama_paket' => $this->input->post('nama_paket'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'diskon' => $this->input->post('diskon'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'ketentuan' => $this->input->post('ketentuan'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_paket->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('paket');
            } //tanpa ganti gambar
            $data = array(
                'id_paket' => $id_paket,
                'nama_paket' => $this->input->post('nama_paket'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'diskon' => $this->input->post('diskon'),
                'deskripsi' => $this->input->post('deskripsi'),
                'ketentuan' => $this->input->post('ketentuan'),
            );
            $this->m_paket->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('paket');
        }

        $data = array(
            'title' => 'Edit paket',
            'kategori' => $this->m_kategori->kategori(),
            'paket' => $this->m_paket->detail($id_paket),
            'isi' => 'layout/backend/paket/v_edit'
        );
        $this->load->view('layout/backend/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($id_paket = NULL)
    {
        //hapus gambar
        $paket = $this->m_paket->detail($id_paket);
        if ($paket->gambar !== "") {
            unlink('./assets/gambar/' . $paket->gambar);
        }

        $data = array(
            'id_paket' => $id_paket
        );
        $this->m_paket->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('paket');
    }
}
