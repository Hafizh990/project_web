<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('Mdl_gotrash');

          if ($this->session->userdata('level') != '4') {
               redirect('driver/authdriver');
          }
     }

     public function index()
     {
          // param filtering
          $id_order = $this->input->post('no_pesanan');
          $data['orders'] = $this->Mdl_gotrash->get_orders_by_driver($id_order);


          // param get pesanan per masing-masing driver
          $id_driver = $this->session->userdata('id_driver');
          $data['pesanan'] = $this->db->query("SELECT * FROM pesanan 
          JOIN paket on paket.id_paket = pesanan.id_paket
          JOIN customer on customer.id_customer = pesanan.id_customer
          JOIN driver on driver.id_driver = pesanan.id_driver
          JOIN kendaraan on kendaraan.id_kendaraan = pesanan.id_kendaraan
          LEFT JOIN merchant on merchant.id_merchant = pesanan.id_merchant
          WHERE driver.id_driver ='$id_driver' AND pesanan.status = 0
          ORDER BY driver.id_driver DESC")->result();

          // get select to filter ID pesanan
          $this->db->select('*');
          $this->db->from('pesanan');
          $this->db->where('pesanan.id_driver', $id_driver);
          $query = $this->db->get();
          $data['orderid'] = $query->result();

          $this->load->view('templatesdriver/header');
          $this->load->view('driver/dashboard', $data);
          $this->load->view('templatesdriver/footer');
     }

     public function konfirmasi($id)
     {
          $this->db->update('pesanan', ['status' => '1'], ['no_pesanan' => $id]);
          $this->session->set_flashdata('sukses', "Driver telah menerima pesanan pelanggan");
          redirect('driver/dashboard');
     }
}
