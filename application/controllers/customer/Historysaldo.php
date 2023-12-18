<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historysaldo extends CI_Controller
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
        $data['historysaldo'] = $this->db->query("SELECT * FROM `topup_history` 
        JOIN customer on customer.id_customer = topup_history.id_customer
        WHERE customer.id_customer ='$id_customer'
        ORDER BY customer.id_customer DESC")->result();
        $data['driver'] = $this->Mdl_gotrash->get_data('driver')->result();
        $this->load->view('templatescustomer/header');
        $this->load->view('customer/historysaldo', $data);
        $this->load->view('templatescustomer/footer');
    }
}
