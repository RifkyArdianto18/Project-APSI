<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stnk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_stnk');
    }

    public function index()
    {
        $data['penjualan'] = $this->M_stnk->get_penjualan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('stnk/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id_penjualan)
    {
        $data = [
            'id_penjualan' => $id_penjualan,
            'tanggal_mulai' => date('Y-m-d'),
            'tanggal_selesai' => date('Y-m-d', strtotime('+14 days')),
            'status' => 'proses'
        ];

        $this->M_stnk->insert($data);

        redirect('stnk');
    }
}