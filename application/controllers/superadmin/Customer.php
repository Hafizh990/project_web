<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if ($this->session->userdata('level') != '1') {
               redirect('superadmin/authadmin');
          }
     }

     public function index()
     {
          $data['customer'] = $this->db->query("SELECT * FROM customer")->result();
          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/customer', $data);
          $this->load->view('templatesadmin/footer');
     }

     public function add_act()
     {
          $no_ktp               = $this->input->post('no_ktp');
          $nama_customer        = $this->input->post('nama_customer');
          $gender               = $this->input->post('gender');
          $email                = $this->input->post('email');
          $password             = md5($this->input->post('password'));
          $no_hp                = $this->input->post('no_hp');
          $active               = $this->input->post('active');

          $check_ktp_customer  = $this->Mdl_gotrash->get_data_by_ktp_customer($no_ktp);
          if ($check_ktp_customer->num_rows() > 0) {
               $this->session->set_flashdata('gagal', 'No Identitas (KTP) telah terdaftar, silahkan daftar dengan no ktp yang belum terdaftar');
               redirect('superadmin/customer');
          }

          $data = array(
               'no_ktp'         => $no_ktp,
               'nama_customer'  => $nama_customer,
               'gender'         => $gender,
               'email'          => $email,
               'password'       => $password,
               'no_hp'          => $no_hp,
               'active'         => $active,
               'level'          => 2
          );

          $this->Mdl_gotrash->insert_data($data, 'customer');
          $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
          redirect('superadmin/customer');
     }

     public function update_act()
     {
          $id = $this->input->post('id_customer');
          $cs = $this->db->select('*')->get_where('customer', array('id_customer' => $id))->row();
          $no_ktp = $this->input->post('no_ktp');
          $nama_customer = $this->input->post('nama_customer');
          $gender = $this->input->post('gender');
          $email = $this->input->post('email');
          $no_hp = $this->input->post('no_hp');
          $active = $this->input->post('active');
          if ($this->input->post('password') == $cs->password) {
               $password = $cs->password;
          } else {
               if (!empty($this->input->post('password'))) {
                    $password = md5($this->input->post('password'));
               } else {
                    $password = $cs->password;
               }
          }

          $data = array(
               'no_ktp' => $no_ktp,
               'nama_customer' => $nama_customer,
               'gender' => $gender,
               'email' => $email,
               'no_hp' => $no_hp,
               'active' => $active,
               'level' => 2,
               'password' => $password
          );

          $where = array(
               'id_customer' => $id
          );

          $this->Mdl_gotrash->update_data('customer', $data, $where);
          $this->session->set_flashdata('sukses', 'Data customer berhasil di ubah');
          redirect('superadmin/customer');
     }


     public function delete($id)
     {
          $where = array('id_customer' => $id);
          $this->Mdl_gotrash->delete_data($where, 'customer');
          $this->session->set_flashdata('sukses', 'Data customer berhasil di hapus');
          redirect('superadmin/customer');
     }
}
