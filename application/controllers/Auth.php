<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Post');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'SEAWAVE - Masuk';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_aktif'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                    Password salah !!
                  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
                Email belum teraktivasi !!
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar !!
          </div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar !!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama !!',
            'min_length' => 'Password harus lebih dari 5 karakter !!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Laut Kita - Buat Akun';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth/footer');
        } else {
            $data = [
                'nama'          => htmlspecialchars($this->input->post('nama', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_aktif'      => 1,
                'tanggal_buat'  => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
            Selamat !! Pendaftaran akun berhasil
          </div>');
            redirect('auth');
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        redirect('home');
    }
}
