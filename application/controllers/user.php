<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User extends CI_Controller
{
 
 function __construct()
 {
  parent::__construct();
  $this->load->model('user_model');
 }

function login() {

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('', '
');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User->checkLogin($email, $password);

            if (!empty($user)) 
            {
                $sessionData['id'] = $user['id'];
                $sessionData['email'] = $user['email'];
                $sessionData['NamaDepan'] = $user['NamaDepan'];
                $sessionData['NamaBelakang'] = $user['NamaBelakang'];
                $sessionData['level'] = $user['level'];
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);
                $this->User->updateLastLogin($user['id']);

                if ($this->session->userdata('level') == 1) {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/Beranda');
                }
            }

            $this->session->set_flashdata('error', 'Login Gagal!, Email Atau Password Tidak Cocok  ');
            redirect('user/login');
        }
  $this->load->view('login');
 }
}