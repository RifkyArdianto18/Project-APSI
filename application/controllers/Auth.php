<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $data['total_mobil'] = $this->M_dashboard->total_mobil();
        $data['total_pelanggan'] = $this->M_dashboard->total_pelanggan();
        $data['total_booking'] = $this->M_dashboard->total_booking();
        $data['total_penjualan'] = $this->M_dashboard->total_penjualan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_auth->cek_login($username, $password);

        if ($user) {
            // simpan session
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