<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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
          $data['driver'] = $this->db->query("SELECT * FROM driver")->result();
          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/driver', $data);
          $this->load->view('templatesadmin/footer');
     }

     public function add_act()
     {
          $no_ktp               = $this->input->post('no_ktp');
          $nama_driver          = $this->input->post('nama_driver');
          $gender               = $this->input->post('gender');
          $email                = $this->input->post('email');
          $no_hp                = $this->input->post('no_hp');
          $active               = $this->input->post('active');
          $password             = md5($this->input->post('password'));

          $check_ktp_driver     = $this->Mdl_gotrash->get_data_by_ktp_driver($no_ktp);
          if ($check_ktp_driver->num_rows() > 0) {
               $this->session->set_flashdata('gagal', 'No Identitas (KTP) telah terdaftar, driver tidak bisa daftar lebih dari banyak data!');
               redirect('superadmin/driver');
          }

          $data = array(
               'no_ktp'         => $no_ktp,
               'nama_driver'    => $nama_driver,
               'gender'         => $gender,
               'email'          => $email,
               'no_hp'          => $no_hp,
               'active'         => $active,
               'level'          => 4,
               'password'       => $password
          );

          $this->Mdl_gotrash->insert_data($data, 'driver');
          $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
          redirect('superadmin/driver');
     }

     public function update_act()
     {
          $id                 = $this->input->post('id_driver');
          $cs                 = $this->db->select('*')->get_where('driver', array('id_driver' => $id))->row();
          $no_ktp             = $this->input->post('no_ktp');
          $nama_driver        = $this->input->post('nama_driver');
          $gender             = $this->input->post('gender');
          $email              = $this->input->post('email');
          $no_hp              = $this->input->post('no_hp');
          $active             = $this->input->post('active');
          if ($this->input->post('password') == $cs->password) {
               $password      = $cs->password;
          } else {
               if (!empty($this->input->post('password'))) {
                    $password = md5($this->input->post('password'));
               } else {
                    $password = $cs->password;
               }
          }

          $data = array(
               'no_ktp'       => $no_ktp,
               'nama_driver'  => $nama_driver,
               'gender'       => $gender,
               'email'        => $email,
               'no_hp'        => $no_hp,
               'active'       => $active,
               'level'        => 4,
               'password'     => $password
          );

          $where = array(
               'id_driver' => $id
          );

          $this->Mdl_gotrash->update_data('driver', $data, $where);
          $this->session->set_flashdata('sukses', 'Data driver berhasil di ubah');
          redirect('superadmin/driver');
     }

     public function delete($id)
     {
          $where = array('id_driver' => $id);
          $this->Mdl_gotrash->delete_data($where, 'driver');
          $this->session->set_flashdata('sukses', 'Data driver berhasil di hapus');
          redirect('superadmin/driver');
     }
}
