<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          if ($this->session->userdata('level') != '2') {
               redirect('customer/authcustomer');
          }
     }
     public function index()
     {
          // where motor
          $this->db->select('*');
          $this->db->from('paket');
          $this->db->join('driver', 'driver.id_driver = paket.id_driver');
          $this->db->join('kendaraan', 'kendaraan.id_kendaraan = paket.id_kendaraan');
          $this->db->order_by('paket.harga', 'ASC');
          $this->db->where('kendaraan.jenis', 'Motor');
          $query = $this->db->get();
          $data['paket'] = $query->result();

          // where mobil
          $this->db->select('*');
          $this->db->from('paket');
          $this->db->join('driver', 'driver.id_driver = paket.id_driver');
          $this->db->join('kendaraan', 'kendaraan.id_kendaraan = paket.id_kendaraan');
          $this->db->order_by('paket.harga', 'ASC');
          $this->db->where('kendaraan.jenis', 'Mobil');
          $query = $this->db->get();
          $data['paket2'] = $query->result();

          $id_customer = $this->session->userdata('id_customer');
          // print_r($id_customer);
          $saldo = $this->Mdl_gotrash->get_saldo_by_id_customer($id_customer);
          $data['saldo'] = $saldo;

          $this->load->view('templatescustomer/header');
          $this->load->view('customer/dashboard', $data);
          $this->load->view('templatescustomer/footer');
     }

     public function filter_paket()
     {
          $jenis_kendaraan = $this->input->post('jenis');
          $this->db->select('*');
          $this->db->from('paket');
          $this->db->join('driver', 'driver.id_driver = paket.id_driver');
          $this->db->join('kendaraan', 'kendaraan.id_kendaraan = paket.id_kendaraan');
          $this->db->where('kendaraan.jenis', $jenis_kendaraan);
          $this->db->order_by('paket.harga', 'ASC');
          $query = $this->db->get();
          $data = $query->result();
          echo json_encode($data);
     }
}
