<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelunasan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_pelunasan');
    }

    public function index()
    {
        $data['penjualan'] = $this->M_pelunasan->get_penjualan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pelunasan/index', $data);
        $this->load->view('templates/footer');
    }

    public function bayar($id_penjualan)
    {
        $penjualan = $this->db->get_where('penjualan', ['id_penjualan' => $id_penjualan])->row();

        $data = [
            'id_penjualan' => $id_penjualan,
            'jenis_pembayaran' => 'pelunasan',
            'tgl_bayar' => date('Y-m-d'),
            'jumlah' => $penjualan->total_harga,
            'metode' => 'transfer',
            'status_konfirmasi' => 'lunas',
            'bukti_transfer' => ''
        ];

        $this->M_pelunasan->insert_pelunasan($data);

        $this->db->where('id_penjualan', $id_penjualan);
        $this->db->update('penjualan', [
            'tanggal_lunas' => date('Y-m-d'),
            'status_penyerahan' => 'siap kirim'
        ]);

        redirect('pelunasan');
    }
}