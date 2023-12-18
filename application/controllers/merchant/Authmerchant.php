<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authmerchant extends CI_Controller
{

     public function index()
     {
          $this->_rules();

          if ($this->form_validation->run() == FALSE) {
               $data['title'] = 'Login Account';
               $this->load->view('merchant/authmerchant', $data);
          } else {
               $email         = $this->input->post('email');
               $password      = $this->input->post('password');

               $cek = $this->Mdl_gotrash->cek_login_merchant($email, $password);

               if ($cek == FALSE) {
                    $this->session->set_flashdata('failed', 'Your account has not been registered');
                    redirect('merchant/authmerchant');
               } elseif ($cek->active == 0) {
                    $this->session->set_flashdata('waiting', 'Your account has not been activated');
                    redirect('merchant/authmerchant');
               } else {
                    $this->session->set_userdata('nama_merchant', $cek->nama_merchant);
                    $this->session->set_userdata('email', $cek->email);
                    $this->session->set_userdata('id_merchant', $cek->id_merchant);
                    $this->session->set_userdata('no_hp', $cek->no_hp);
                    $this->session->set_userdata('level', $cek->level);
                    switch ($cek->level) {
                         case 3:
                              $this->session->set_flashdata('sukses', 'Successfully login to dashboard');
                              redirect('merchant/dashboard');
                              break;
                         default:
                              break;
                    }
               }
          }
     }

     public function _rules()
     {
          $this->form_validation->set_rules('email', 'email', 'required');
          $this->form_validation->set_rules('password', 'password', 'required');
     }

     public function logout()
     {
          session_destroy();
          $url = base_url('dashboard');
          redirect($url);
     }
}
