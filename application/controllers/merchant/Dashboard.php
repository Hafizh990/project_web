<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();

          if ($this->session->userdata('level') != '3') {
               redirect('merchant/authmerchant');
          }
     }

     public function index()
     {
          $this->load->view('templatesmerchant/header');
          $this->load->view('merchant/dashboard');
          $this->load->view('templatesmerchant/footer');
     }
}
