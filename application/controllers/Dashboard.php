<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

     public function index()
     {
          $this->load->view('templates/header');
          $this->load->view('dashboard');
          $this->load->view('templates/footer');
     }

     // public function search()
     // {
     //      $asal                = $this->input->post('asal');
     //      $tujuan           = $this->input->post('tujuan');
     //      $tanggal           = $this->input->post('tanggal');

     //      $data['title']           = "Search Travel | JatimTrip";
     //      $data['pemberangkatan'] = $this->db->query("SELECT * FROM jadwal
     // 		INNER JOIN mobil ON mobil.id_mobil = jadwal.id_mobil
     // 		INNER JOIN tiket_kelas ON tiket_kelas.id_tiket_kelas = mobil.id_tiket_kelas
     // 		WHERE jadwal.asal='$asal' AND jadwal.tujuan='$tujuan' AND jadwal.tanggal='$tanggal'")->result();
     //      $this->load->view('layout/frontend/header', $data);
     //      $this->load->view('search_flight', $data);
     //      $this->load->view('layout/frontend/footer');
     // }
}
