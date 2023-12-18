<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authcustomer extends CI_Controller
{

     public function index()
     {
          $this->_rules();

          if ($this->form_validation->run() == FALSE) {
               $data['title'] = 'Login Account';
               $this->load->view('customer/authcustomer', $data);
          } else {
               $email         = $this->input->post('email');
               $password      = $this->input->post('password');

               $cek = $this->Mdl_gotrash->cek_login($email, $password);

               if ($cek == FALSE) {
                    $this->session->set_flashdata('failed', 'Akun Anda belum terdaftar, periksa kembali username dan password anda!');
                    redirect('customer/authcustomer');
               } elseif ($cek->active == 0) {
                    $this->session->set_flashdata('waiting', 'Harap melakukan aktifasi akun anda pada OTP yang terdapat pada email anda');
                    redirect('customer/authcustomer');
               } else {
                    $this->session->set_userdata('nama_customer', $cek->nama_customer);
                    $this->session->set_userdata('email', $cek->email);
                    $this->session->set_userdata('id_customer', $cek->id_customer);
                    $this->session->set_userdata('no_hp', $cek->no_hp);
                    $this->session->set_userdata('level', $cek->level);
                    switch ($cek->level) {
                         case 2:
                              $this->session->set_flashdata('sukses', 'Selamat anda berhasil masuk ke dashboard');
                              redirect('customer/dashboard');
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
