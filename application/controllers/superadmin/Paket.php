<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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
          $data['paket'] = $this->db->query("SELECT * FROM paket
          JOIN driver on driver.id_driver = paket.id_driver
          JOIN kendaraan ON kendaraan.id_kendaraan = paket.id_kendaraan")->result();
          $data['driver'] = $this->Mdl_gotrash->get_data('driver')->result();
          $data['kendaraan'] = $this->db->query("SELECT * FROM kendaraan
          JOIN driver on driver.id_driver = kendaraan.id_driver")->result();
          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/paket', $data);
          $this->load->view('templatesadmin/footer');
     }

     public function add_act()
     {
          $id_driver            = $this->input->post('id_driver');
          $id_kendaraan         = $this->input->post('id_kendaraan');
          $title                = $this->input->post('title');
          $keterangan           = $this->input->post('keterangan');
          $discount             = $this->input->post('discount');
          $harga                = $this->input->post('harga');
          $pickup_time          = $this->input->post('pickup_time');

          $data = array(
               'id_driver'      => $id_driver,
               'id_kendaraan'   => $id_kendaraan,
               'title'          => $title,
               'keterangan'     => $keterangan,
               'discount'       => $discount,
               'harga'          => $harga,
               'pickup_time'    => $pickup_time,
               'created_at'     => date('Y-m-d H:i:s')
          );

          $this->Mdl_gotrash->insert_data($data, 'paket');
          $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
          redirect('superadmin/paket');
     }

     public function update_act()
     {
          $id                 = $this->input->post('id_paket');
          $id_driver          = $this->input->post('id_driver');
          $id_kendaraan       = $this->input->post('id_kendaraan');
          $title              = $this->input->post('title');
          $keterangan         = $this->input->post('keterangan');
          $discount           = $this->input->post('discount');
          $harga              = $this->input->post('harga');

          $data = array(
               'id_driver'    => $id_driver,
               'id_kendaraan' => $id_kendaraan,
               'title'        => $title,
               'keterangan'   => $keterangan,
               'discount'     => $discount,
               'harga'        => $harga
          );

          $where = array(
               'id_paket' => $id
          );

          $this->Mdl_gotrash->update_data('paket', $data, $where);
          $this->session->set_flashdata('sukses', 'Data paket berhasil di ubah');
          redirect('superadmin/paket');
     }

     public function delete($id)
     {
          $where = array('id_paket' => $id);
          $this->Mdl_gotrash->delete_data($where, 'paket');
          $this->session->set_flashdata('sukses', 'Data paket berhasil di hapus');
          redirect('superadmin/paket');
     }
}
