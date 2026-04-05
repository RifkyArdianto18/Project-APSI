<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_penjualan');
    }

    public function index()
    {
        $data['booking'] = $this->M_penjualan->get_booking_dp();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id_booking)
    {
        $cek = $this->db->get_where('penjualan', ['id_booking' => $id_booking])->row();
        if ($cek) {
            redirect('penjualan');
        }

        $booking = $this->db->get_where('booking', ['id_booking' => $id_booking])->row();
        $mobil = $this->db->get_where('mobil', ['id_mobil' => $booking->id_mobil])->row();

        $data = [
            'id_booking' => $id_booking,
            'tanggal_lunas' => NULL,
            'total_harga' => $mobil->harga_jual,
            'status_penyerahan' => 'proses'
        ];

        $this->M_penjualan->insert($data);

        // update mobil
        $this->db->where('id_mobil', $booking->id_mobil);
        $this->db->update('mobil', ['status_mobil' => 'terjual']);

        // update booking
        $this->db->where('id_booking', $id_booking);
        $this->db->update('booking', ['status' => 'proses']);

        redirect('penjualan');
    }
}