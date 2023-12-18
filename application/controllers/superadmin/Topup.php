<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if ($this->session->userdata('level') != '1') {
               redirect('superadmin/authadmin');
          }
     }

     public function index()
     {
          $data['saldo'] = $this->db->query("SELECT * FROM saldo
          JOIN customer on customer.id_customer = saldo.id_customer")->result();
          $data['customer'] = $this->Mdl_gotrash->get_data('customer')->result();
          $this->load->view('templatesadmin/header');
          $this->load->view('superadmin/topup', $data);
          $this->load->view('templatesadmin/footer');
     }

     public function add_act()
     {
          $id_customer = $this->input->post('id_customer');
          $jumlah = $this->input->post('jumlah');

          $query = $this->db->get_where('saldo', array('id_customer' => $id_customer));
          if ($query->num_rows() > 0) {
               //update data saldo
               $this->db->set('jumlah', 'jumlah + ' . $jumlah, false);
               $this->db->set('topup_at', date('Y-m-d H:i:s'));
               $this->db->where('id_customer', $id_customer);
               $this->db->update('saldo');
          } else {
               //insert data saldo
               $data = array(
                    'id_customer' => $id_customer,
                    'jumlah' => $jumlah,
                    'topup_at' => date('Y-m-d H:i:s')
               );
               $this->db->insert('saldo', $data);
          }
          //insert data to history top-up
          $data_history = array(
               'id_customer' => $id_customer,
               'jumlah' => $jumlah,
               'topup_at' => date('Y-m-d H:i:s')
          );
          $this->db->insert('topup_history', $data_history);

          $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
          redirect('superadmin/topup');
     }
}
