<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
        $this->db->select('pesanan.*, paket.title, customer.nama_customer, driver.nama_driver, kendaraan.merk');
        $this->db->from('pesanan');
        $this->db->join('paket', 'paket.id_paket = pesanan.id_paket');
        $this->db->join('customer', 'customer.id_customer = pesanan.id_customer');
        $this->db->join('driver', 'driver.id_driver = pesanan.id_driver');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.id_kendaraan');
        $this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant', 'left');
        $query = $this->db->get();
        $data['pesanan'] = $query->result();
        $data['driver'] = $this->Mdl_gotrash->get_data('driver')->result();

        $this->load->view('templatesadmin/header');
        $this->load->view('superadmin/pesanan', $data);
        $this->load->view('templatesadmin/footer');
    }

    public function add_act()
    {
        $id_driver            = $this->input->post('id_driver');
        $merk                 = $this->input->post('merk');
        $jenis                = $this->input->post('jenis');
        $tahun                = $this->input->post('tahun');
        $no_pol               = $this->input->post('no_pol');

        $check_no_pol = $this->Mdl_gotrash->get_data_by_no_pol($no_pol);
        if ($check_no_pol->num_rows() > 0) {
            $this->session->set_flashdata('gagal', 'No. Polisi telah terdaftar, silahkan input dengan no polisi yang lain');
            redirect('superadmin/kendaraan');
        }

        $check_id_driver = $this->Mdl_gotrash->get_data_by_id_driver($id_driver);
        if ($check_id_driver->num_rows() > 0) {
            $this->session->set_flashdata('gagal', 'ID Driver telah terdaftar, silahkan daftar dengan ID Driver yang belum terdaftar');
            redirect('superadmin/kendaraan');
        }

        $data = array(
            'id_driver'      => $id_driver,
            'merk'           => $merk,
            'jenis'          => $jenis,
            'tahun'          => $tahun,
            'no_pol'         => $no_pol,
            'created_at'     => date('Y-m-d H:i:s')
        );

        $this->Mdl_gotrash->insert_data($data, 'kendaraan');
        $this->session->set_flashdata('sukses', 'Anda berhasil menambah data');
        redirect('superadmin/kendaraan');
    }
}
