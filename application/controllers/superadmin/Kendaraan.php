<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
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
          $data['kendaraan'] = $this->db->query("SELECT * FROM kendaraan
          JOIN driver on driver.id_driver = kendaraan.id_driver")->result();
          $data['driver'] = $this->Mdl_gotrash->get_data('driver')->result();
          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/kendaraan', $data);
          $this->load->view('templatesadmin/footer');
     }

     public function add_act()
     {
          $id_driver            = $this->input->post('id_driver');
          $merk                 = $this->input->post('merk');
          $jenis                = $this->input->post('jenis');
          $tahun                = $this->input->post('tahun');
          $no_pol               = $this->input->post('no_pol');

          $check_no_pol = $this->Mdl_gotrash->get_data_by_no_pol($no_pol);
          if ($check_no_pol->num_rows() > 0) {
               $this->session->set_flashdata('gagal', 'No. Polisi telah terdaftar, silahkan input dengan no polisi yang lain');
               redirect('superadmin/kendaraan');
          }

          $check_id_driver = $this->Mdl_gotrash->get_data_by_id_driver($id_driver);
          if ($check_id_driver->num_rows() > 0) {
               $this->session->set_flashdata('gagal', 'ID Driver telah terdaftar, silahkan daftar dengan ID Driver yang belum terdaftar');
               redirect('superadmin/kendaraan');
          }

          $data = array(
               'id_driver'      => $id_driver,
               'merk'           => $merk,
               'jenis'          => $jenis,
               'tahun'          => $tahun,
               'no_pol'         => $no_pol,
               'created_at'     => date('Y-m-d H:i:s')
          );

          $this->Mdl_gotrash->insert_data($data, 'kendaraan');
          $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
          redirect('superadmin/kendaraan');
     }

     public function update_act()
     {
          $id                 = $this->input->post('id_kendaraan');
          $id_driver          = $this->input->post('id_driver');
          $merk               = $this->input->post('merk');
          $jenis              = $this->input->post('jenis');
          $tahun              = $this->input->post('tahun');
          $no_pol             = $this->input->post('no_pol');

          $data = array(
               'id_driver'    => $id_driver,
               'merk'         => $merk,
               'jenis'        => $jenis,
               'tahun'        => $tahun,
               'no_pol'       => $no_pol
          );

          $where = array(
               'id_kendaraan' => $id
          );

          $this->Mdl_gotrashk->update_data('kendaraan', $data, $where);
          $this->session->set_flashdata('sukses', 'Data kendaraan berhasil di ubah');
          redirect('superadmin/kendaraan');
     }

     public function delete($id)
     {
          $where = array('id_kendaraan' => $id);
          $this->Mdl_gotrash->delete_data($where, 'kendaraan');
          $this->session->set_flashdata('sukses', 'Data kendaraan berhasil di hapus');
          redirect('superadmin/kendaraan');
     }
}
