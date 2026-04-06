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
        // ambil data penjualan + DP
        $penjualan = $this->db
            ->select('penjualan.*, booking.id_booking, mobil.harga_jual')
            ->join('booking', 'booking.id_booking = penjualan.id_booking')
            ->join('mobil', 'mobil.id_mobil = booking.id_mobil')
            ->where('id_penjualan', $id_penjualan)
            ->get('penjualan')
            ->row();

        // ambil total DP
        $dp = $this->db
            ->select_sum('jumlah')
            ->where('id_booking', $penjualan->id_booking)
            ->where('jenis_pembayaran', 'dp')
            ->get('pembayaran')
            ->row()->jumlah;

        $sisa = $penjualan->total_harga - $dp;

        // CEK SUDAH LUNAS BELUM
        $cek = $this->db
            ->where('id_penjualan', $id_penjualan)
            ->where('jenis_pembayaran', 'pelunasan')
            ->get('pembayaran')
            ->row();

        if ($cek) {
            $this->session->set_flashdata('error', 'Sudah dilakukan pelunasan!');
            redirect('pelunasan');
        }

        // simpan
        $data = [
            'id_penjualan' => $id_penjualan,
            'jenis_pembayaran' => 'pelunasan',
            'tgl_bayar' => date('Y-m-d'),
            'jumlah' => $sisa,
            'metode' => 'transfer',
            'status_konfirmasi' => 'diterima',
            'bukti_transfer' => ''
        ];

        $this->M_pelunasan->insert_pelunasan($data);

        $this->db->where('id_penjualan', $id_penjualan);
        $this->db->update('penjualan', [
            'tanggal_lunas' => date('Y-m-d'),
            'status_penyerahan' => 'siap'
        ]);

        $this->db->where('id_mobil', $penjualan->id_mobil);
        $this->db->update('mobil', ['status_mobil' => 'terjual']);

        redirect('pelunasan');
    }
}