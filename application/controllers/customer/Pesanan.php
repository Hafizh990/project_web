<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          if ($this->session->userdata('level') != '2') {
               redirect('customer/authcustomer');
          }
     }

     public function tambah_pesanan($id)
     {
          $data['detail'] = $this->Mdl_gotrash->ambil_id_paket_join_driver($id);
          $this->load->view('templatescustomer/header');
          $this->load->view('customer/pesanan', $data);
          $this->load->view('templatescustomer/footer');
     }

     public function calculate_total_amount($harga, $discount)
     {
          return $harga - ($discount);
     }

     public function add_act()
     {
          $id_customer        = $this->session->userdata('id_customer');
          $customer_saldo     = $this->Mdl_gotrash->get_data_by_id_saldo($id_customer, 'saldo');
          $id_paket           = $this->input->post('id_paket');
          $id_driver          = $this->input->post('id_driver');
          $id_kendaraan       = $this->input->post('id_kendaraan');

          $this->tambah_pesanan($id_paket, $id_driver, $id_kendaraan);
          $no_pesanan         = $this->input->post('no_pesanan');
          $id_customer        = $this->session->userdata('id_customer');
          $discount           = $this->input->post('discount');
          $harga              = $this->input->post('harga');
          $lokasi_jemput      = $this->input->post('lokasi_jemput');
          $lokasi_antar       = $this->input->post('lokasi_antar');
          $total_amount       = $this->calculate_total_amount($harga, $discount);

          $data = array(
               'no_pesanan'    => $no_pesanan,
               'id_paket'      => $id_paket,
               'id_customer'   => $id_customer,
               'id_driver'     => $id_driver,
               'id_kendaraan'  => $id_kendaraan,
               'discount'      => $discount,
               'harga'         => $harga,
               'lokasi_jemput' => $lokasi_jemput,
               'lokasi_antar'  => $lokasi_antar,
               'total_amount'  => $total_amount,
               'status'        => 0,
               'paid_at'       => date('Y-m-d H:i:s'),
               'created_at'    => date('Y-m-d H:i:s')
          );

          if ($customer_saldo->jumlah < $total_amount) {
               $this->session->set_flashdata('gagal', 'Saldo anda tidak cukup untuk melakukan transaksi, silahkan lakukan top-up isi ulang');
               redirect('customer/dashboard');
          } else {
               $this->Mdl_gotrash->insert_data($data, 'pesanan');
               $this->session->set_flashdata('sukses', 'Anda berhasil melakukan transaksi pemesanan');
               redirect('customer/dashboard');
          }
     }
}
