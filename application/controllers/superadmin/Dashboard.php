<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->model('Mdl_gotrash');

          if ($this->session->userdata('level') != '1') {
               redirect('superadmin/authadmin');
          }
     }

     public function index()
     {
          // parameter filtering
          $selected_customer_id = $this->input->post('id_customer');
          $data['orders'] = $this->Mdl_gotrash->get_orders_by_customer($selected_customer_id);

          // get select to filter customer
          $this->db->select('*');
          $this->db->from('customer');
          $query = $this->db->get();
          $data['customers'] = $query->result();

          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/dashboard', $data);
          $this->load->view('templatesadmin/footer');
     }
}
