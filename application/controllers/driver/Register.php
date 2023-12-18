<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');
     }

     public function index()
     {
          $this->form_validation->set_rules('no_ktp', 'Your Identity Number', 'required|trim');
          $this->form_validation->set_rules('nama_driver', 'Your Name', 'required|trim');
          $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[driver.email]', [
               'is_unique' => 'This email has already registered!'
          ]);
          $this->form_validation->set_rules('no_hp', 'Mobile Phone', 'required|trim|numeric');
          $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|matches[confpassword]', [
               'matches' => 'Password dont macth!',
               'min_length' => 'Password too short!',
          ]);
          $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|trim|matches[password]');

          if ($this->form_validation->run() == false) {
               $data['title'] = 'Register Account';
               $this->load->view('driver/register', $data);
          } else {
               $email = $this->input->post('email', true);
               $data = [
                    'no_ktp'            => $this->input->post('no_ktp'),
                    'nama_driver'       => $this->input->post('nama_driver'),
                    'gender'            => $this->input->post('gender'),
                    'email'             => htmlspecialchars($email),
                    'no_hp'             => $this->input->post('no_hp'),
                    'password'          => md5($this->input->post('password')),
                    'level'             => 4,
                    'active'            => 0
               ];

               // token
               $token = base64_encode(random_bytes(32));
               $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
               ];

               $this->db->insert('driver', $data);
               $this->db->insert('user_token', $user_token);

               $this->email($token, 'verify');

               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Please check your email inbox!
                </div>');
               redirect('driver/authdriver');
          }
     }


     public function verify()
     {
          $email = $this->input->get('email');
          $token = $this->input->get('token');

          $user = $this->db->get_where('driver', ['email' => $email])->row_array();

          if ($user) {
               $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
               if ($user_token) {
                    if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                         $this->db->set('active', 1);
                         $this->db->where('email', $email);
                         $this->db->update('driver');

                         $this->db->delete('user_token', ['email' => $email]);

                         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' has been activated!
                    </div>');
                         redirect('driver/authdriver');
                    } else {
                         $this->db->delete('driver', ['email' => $email]);
                         $this->db->delete('user_token', ['email' => $email]);

                         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activation failed! Token Expired.
                    </div>');
                         redirect('driver/authdriver');
                    }
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Account activation failed! Token Invalid.
                </div>');
                    redirect('driver/authdriver');
               }
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activation failed! Wrong email.
            </div>');
               redirect('driver/authdriver');
          }
     }

     public function email($token, $type)
     {
          $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
               'smtp_user' => 'ngojeks.online@gmail.com',  // Email gmail admin aplikasi
               'smtp_pass'   => 'rnnhjgfuyendhrnf',  // Password Gmail atau Sandi Aplikasi Gmail
               'smtp_crypto' => 'ssl',
               'smtp_port'   => 465,
               'crlf'    => "\r\n",
               'newline' => "\r\n"
          ];
          $this->load->library('email', $config); // panggil library email
          $this->email->initialize($config);
          $this->email->from('ngojeks.online@gmail.com', 'Verifikasi Email Ngojeks Online Transportasi');
          $this->email->to($this->input->post('email'));

          if ($type == 'verify') {
               $this->email->subject('Account Verification');
               $this->email->message('Hi Driver GoTrash, Klik link berikut untuk verifikasi account anda. : <a href="' . base_url() . 'driver/register/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
          }

          if ($this->email->send()) {
               echo 'Email sent.';
          } else {
               show_error($this->email->print_debugger());
          }
     }
}
