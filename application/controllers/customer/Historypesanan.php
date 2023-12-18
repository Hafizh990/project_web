<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historypesanan extends CI_Controller
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
        $id_customer = $this->session->userdata('id_customer');
        $data['historypesanan'] = $this->db->query("SELECT * FROM pesanan 
        JOIN paket on paket.id_paket = pesanan.id_paket
        JOIN customer on customer.id_customer = pesanan.id_customer
        JOIN driver on driver.id_driver = pesanan.id_driver
        JOIN kendaraan on kendaraan.id_kendaraan = pesanan.id_kendaraan
        LEFT JOIN merchant on merchant.id_merchant = pesanan.id_merchant
        WHERE customer.id_customer ='$id_customer'
        ORDER BY customer.id_customer DESC")->result();
        $this->load->view('templatescustomer/header');
        $this->load->view('customer/historypesanan', $data);
        $this->load->view('templatescustomer/footer');
    }
}
