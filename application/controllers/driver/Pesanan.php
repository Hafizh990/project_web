<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('level') != '4') {
            redirect('driver/authdriver');
        }
    }

    public function index()
    {
        $id_driver = $this->session->userdata('id_driver');
        $data['pesanan'] = $this->db->query("SELECT * FROM pesanan 
        JOIN paket on paket.id_paket = pesanan.id_paket
        JOIN customer on customer.id_customer = pesanan.id_customer
        JOIN driver on driver.id_driver = pesanan.id_driver
        JOIN kendaraan on kendaraan.id_kendaraan = pesanan.id_kendaraan
        LEFT JOIN merchant on merchant.id_merchant = pesanan.id_merchant
        WHERE driver.id_driver ='$id_driver'
        ORDER BY driver.id_driver DESC")->result();
        $this->load->view('templatesdriver/header');
        $this->load->view('driver/pesanan', $data);
        $this->load->view('templatesdriver/footer');
    }
}
