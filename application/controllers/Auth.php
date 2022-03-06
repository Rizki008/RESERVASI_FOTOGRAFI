<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->user_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login_user', $data, FALSE);
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}
