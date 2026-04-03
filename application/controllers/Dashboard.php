<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        // WAJIB
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
}