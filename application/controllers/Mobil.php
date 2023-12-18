<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{

     public function index()
     {
          // $data['title'] = "Book Flight | Travelook Indonesia";
          // $mobil = $this->db->query("SELECT * FROM mobil");
          // $data['mobil'] = $mobil->num_rows();
          // $cover = $this->db->query("SELECT * FROM cover_area");
          // $data['cover'] = $cover->num_rows();
          // $pembelian = $this->db->query("SELECT * FROM pembelian");
          // $data['pembelian'] = $pembelian->num_rows();
          // $bandara = $this->db->query("SELECT * FROM bandara");
          // $data['bandara'] = $bandara->num_rows();
          // $jadwal = $this->db->query("SELECT * FROM jadwal");
          // $data['jadwal'] = $jadwal->num_rows();
          // $data['penerbangan'] = $this->travelokaModel->get_data('penerbangan')->result();
          // $data['pembelian'] = $jadwal->num_rows();
          // $data['pembelian'] = $this->travelokaModel->get_data('pembelian')->result();
          $this->load->view('templates/header');
          $this->load->view('mobil');
          $this->load->view('templates/footer');
     }
}
