<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_pembayaran');
    }

    public function tambah()
    {
        $data['booking'] = $this->M_pembayaran->get_booking();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        // upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        $file_name = '';

        if ($this->upload->do_upload('bukti')) {
            $file = $this->upload->data();
            $file_name = $file['file_name'];
        }

        $id_booking = $this->input->post('id_booking');

        // AMBIL DATA BOOKING + MOBIL
        $booking = $this->db
            ->select('booking.*, mobil.harga_jual')
            ->join('mobil', 'mobil.id_mobil = booking.id_mobil')
            ->where('booking.id_booking', $id_booking)
            ->get('booking')
            ->row();

        // HITUNG DP (30%)
        $dp_minimal = 0.3 * $booking->harga_jual;

        $jumlah = $this->input->post('jumlah');

        // VALIDASI
        if ($jumlah < $dp_minimal) {
            $this->session->set_flashdata('error', 'DP minimal 30% dari harga mobil!');
            redirect('pembayaran/tambah');
        }

        $data = [
            'id_booking' => $id_booking,
            'id_penjualan' => NULL,
            'jenis_pembayaran' => 'dp',
            'tgl_bayar' => date('Y-m-d'),
            'jumlah' => $jumlah,
            'metode' => $this->input->post('metode'),
            'status_konfirmasi' => 'pending',
            'bukti_transfer' => $file_name
        ];

        $this->M_pembayaran->insert($data);

        $this->db->where('id_booking', $id_booking);
        $this->db->update('booking', ['status' => 'dp']);

        $this->db->insert('penjualan', [
            'id_booking' => $id_booking,
            'status_penyerahan' => 'diproses'
        ]);

        $id_penjualan = $this->db->insert_id();

        $this->db->insert('pengurusan_stnk', [
            'id_penjualan' => $id_penjualan,
            'tanggal_mulai' => date('Y-m-d'),
            'status' => 'diproses'
        ]);

        $this->db->insert('pengurusan_bpkb', [
            'id_penjualan' => $id_penjualan,
            'tanggal_mulai' => date('Y-m-d'),
            'status' => 'diproses'
        ]);

        redirect('booking');

        // CEK SUDAH DP BELUM
        $cek = $this->db
            ->where('id_booking', $id_booking)
            ->where('jenis_pembayaran', 'dp')
            ->get('pembayaran')
            ->row();

        if ($cek) {
            $this->session->set_flashdata('error', 'DP sudah dibayar!');
            redirect('booking');
        }
    }
}