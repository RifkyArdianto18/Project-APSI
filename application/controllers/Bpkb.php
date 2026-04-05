<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpkb extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_bpkb');
    }

    public function index()
    {
        $data['bpkb'] = $this->M_bpkb->get_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('bpkb/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id_penjualan)
    {
        // cek sudah ada atau belum
        $cek = $this->db->get_where('pengurusan_bpkb', ['id_penjualan' => $id_penjualan])->row();

        if (!$cek) {
            $data = [
                'id_penjualan' => $id_penjualan,
                'tanggal_mulai' => date('Y-m-d'),
                'tanggal_selesai' => date('Y-m-d', strtotime('+60 days')),
                'status' => 'proses'
            ];

            $this->M_bpkb->insert($data);
        }

        redirect('bpkb');
    }

    public function selesai($id_penjualan)
    {
        $data = [
            'status' => 'selesai',
            'tanggal_selesai' => date('Y-m-d')
        ];

        $this->M_bpkb->update($id_penjualan, $data);

        redirect('bpkb');
    }
}