<?php

class Mdl_gotrash extends CI_Model
{

     public function get_data($table)
     {
          return $this->db->get($table);
     }

     public function insert_data($data, $table)
     {
          $this->db->insert($table, $data);
     }

     public function edit($where, $table)
     {
          return $this->db->get_where($table, $where);
     }

     public function update_data($table, $data, $where)
     {
          $this->db->update($table, $data, $where);
     }

     public function delete_data($where, $table)
     {
          $this->db->where($where);
          $this->db->delete($table);
     }

     public function ambil_id_paket_join_driver($id)
     {
          $this->db->select('*');
          $this->db->from('paket');
          $this->db->join('driver', 'driver.id_driver = paket.id_driver');
          $this->db->join('kendaraan', 'kendaraan.id_kendaraan = paket.id_kendaraan');
          $this->db->where('paket.id_paket', $id);
          $query = $this->db->get();
          return $query->result();
     }

     public function get_count_paket()
     {
          return $this->db->count_all('pesanan');
     }

     public function cek_login()
     {
          $email        = set_value('email');
          $password     = set_value('password');

          $result = $this->db->where('email', $email)
               ->where('password', md5($password))
               ->limit(1)
               ->get('customer');
          if ($result->num_rows() > 0) {
               return $result->row();
          } else {
               return FALSE;
          }
     }

     public function cek_login_merchant()
     {
          $email        = set_value('email');
          $password     = set_value('password');

          $result = $this->db->where('email', $email)
               ->where('password', md5($password))
               ->limit(1)
               ->get('merchant');
          if ($result->num_rows() > 0) {
               return $result->row();
          } else {
               return FALSE;
          }
     }

     public function cek_login_driver()
     {
          $email        = set_value('email');
          $password     = set_value('password');

          $result = $this->db->where('email', $email)
               ->where('password', md5($password))
               ->limit(1)
               ->get('driver');
          if ($result->num_rows() > 0) {
               return $result->row();
          } else {
               return FALSE;
          }
     }

     public function cek_login_admin()
     {
          $username        = set_value('username');
          $password        = set_value('password');

          $result = $this->db->where('username', $username)
               ->where('password', md5($password))
               ->limit(1)
               ->get('admin');
          if ($result->num_rows() > 0) {
               return $result->row();
          } else {
               return FALSE;
          }
     }

     function get_data_by_no_pol($no_pol)
     {
          $this->db->where('no_pol', $no_pol);
          $query = $this->db->get('kendaraan');
          return $query;
     }

     function get_data_by_id_driver($id_driver)
     {
          $this->db->where('id_driver', $id_driver);
          $query = $this->db->get('kendaraan');
          return $query;
     }

     function get_data_by_id_saldo($id)
     {
          $this->db->where('id_customer', $id);
          $query = $this->db->get('saldo');
          return $query->row();
     }

     function get_data_by_ktp_customer($no_ktp)
     {
          $this->db->where('no_ktp', $no_ktp);
          $query = $this->db->get('customer');
          return $query;
     }

     function get_data_by_ktp_driver($no_ktp)
     {
          $this->db->where('no_ktp', $no_ktp);
          $query = $this->db->get('driver');
          return $query;
     }

     function get_data_by_id_customer($id_customer)
     {
          $this->db->where('id_customer', $id_customer);
          $query = $this->db->get('saldo');
          return $query;
     }

     public function get_orders_by_customer($id_customer)
     {
          $this->db->select('count(no_pesanan) AS orders, sum(discount) AS discount, sum(total_amount) AS amount');
          $this->db->from('pesanan');
          $this->db->where('id_customer', $id_customer);
          $query = $this->db->get();
          return $query->row();
     }

     public function get_orders_by_driver($id_order)
     {
          $this->db->select('*');
          $this->db->from('pesanan');
          $this->db->join('paket', 'paket.id_paket = pesanan.id_paket');
          $this->db->join('customer', 'customer.id_customer = pesanan.id_customer');
          $this->db->join('driver', 'driver.id_driver = pesanan.id_driver');
          $this->db->join('kendaraan', 'kendaraan.id_kendaraan = pesanan.id_kendaraan');
          $this->db->join('merchant', 'merchant.id_merchant = pesanan.id_merchant', 'left');
          $this->db->where('no_pesanan', $id_order);
          $this->db->where('status', '1');
          $query = $this->db->get();
          return $query->row();
     }

     public function get_saldo_by_id_customer($id_customer)
     {
          $this->db->select('sum(jumlah) as jumlah');
          $this->db->from('saldo');
          $this->db->where('id_customer', $id_customer);
          $query = $this->db->get();
          // echo $this->db->last_query();
          // die();
          return $query->row();
     }
}
