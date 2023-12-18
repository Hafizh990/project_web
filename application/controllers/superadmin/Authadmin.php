<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authadmin extends CI_Controller
{

     public function index()
     {
          $this->_rules();

          if ($this->form_validation->run() == FALSE) {
               $data['title'] = 'Login Account';
               $this->load->view('superadmin/authadmin', $data);
          } else {
               $username      = $this->input->post('username');
               $password      = $this->input->post('password');

               $cek = $this->Mdl_gotrash->cek_login_admin($username, $password);

               if ($cek == FALSE) {
                    $this->session->set_flashdata('failed', 'Akun Anda belum terdaftar, periksa kembali username dan password anda!');
                    redirect('superadmin/authadmin');
               } else {
                    $this->session->set_userdata('nama_admin', $cek->nama_admin);
                    $this->session->set_userdata('level', $cek->level);
                    switch ($cek->level) {
                         case 1:
                              $this->session->set_flashdata('sukses', 'Selamat anda berhasil masuk ke dashboard');
                              redirect('superadmin/dashboard');
                              break;
                         default:
                              break;
                    }
               }
          }
     }

     public function _rules()
     {
          $this->form_validation->set_rules('username', 'username', 'required');
          $this->form_validation->set_rules('password', 'password', 'required');
     }

     public function logout()
     {
          session_destroy();
          $url = base_url('dashboard');
          redirect($url);
     }
}
