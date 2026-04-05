<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth'); // 🔥 yang benar
    }

    public function index()
    {
        // kalau sudah login → ke dashboard
        if ($this->session->userdata('login') == true) {
            redirect('dashboard');
        }

        // kalau belum login → tampil login
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_auth->cek_login($username, $password);

        if ($user) {
            $data = [
                'id_pengguna' => $user->id_pengguna,
                'nama' => $user->nama_pengguna,
                'role' => $user->role,
                'login' => true
            ];

            $this->session->set_userdata($data);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}