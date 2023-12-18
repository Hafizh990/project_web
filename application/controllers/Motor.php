<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Motor extends CI_Controller
{

     public function index()
     {
          $data['paket'] = $this->db->query("SELECT * FROM paket
          JOIN driver on driver.id_driver = paket.id_driver
          JOIN kendaraan ON kendaraan.id_kendaraan = paket.id_kendaraan
          WHERE kendaraan.jenis ='Motor'")->result();
          $this->load->view('templates/header');
          $this->load->view('motor', $data);
          $this->load->view('templates/footer');
     }
}
