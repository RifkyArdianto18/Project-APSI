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
        // statistik
        $data['total_mobil'] = $this->db->count_all('mobil');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_booking'] = $this->db->count_all('booking');
        $data['total_penjualan'] = $this->db->count_all('penjualan');

        // tambahan
        $data['booking_aktif'] = $this->db
            ->where('status','booking')
            ->count_all_results('booking');

        $data['mobil_tersedia'] = $this->db
            ->where('status_mobil','tersedia')
            ->count_all_results('mobil');

        $bulan = [];
        $jumlah = [];

        for ($i=1; $i<=12; $i++) {

            $bulan[] = date('M', mktime(0,0,0,$i,1));

            $this->db->where('MONTH(tanggal_lunas)', $i);
            $jumlah[] = $this->db->count_all_results('penjualan');
        }

        $data['bulan'] = $bulan;
        $data['jumlah_penjualan'] = $jumlah;

        // load view
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}