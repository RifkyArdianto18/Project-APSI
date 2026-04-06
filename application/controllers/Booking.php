<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_booking');
    }

    public function index()
    {
        // AUTO UPDATE EXPIRED
        $this->M_booking->update_expired();

        $data['booking'] = $this->M_booking->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('booking/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['pelanggan'] = $this->M_booking->get_pelanggan();
        $data['mobil'] = $this->M_booking->get_mobil();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('booking/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $id_mobil = $this->input->post('id_mobil');

        $mobil = $this->db->get_where('mobil', ['id_mobil' => $id_mobil])->row();

        if ($mobil->status_mobil != 'tersedia') {
            $this->session->set_flashdata('error', 'Mobil sudah dibooking!');
            redirect('booking');
        }

        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pengguna' => $this->session->userdata('id_pengguna'),
            'id_mobil' => $id_mobil,
            'tgl_booking' => date('Y-m-d'),
            'batas_dp' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'booking'
        ];

        $this->M_booking->insert($data);

        $id_booking = $this->db->insert_id();

        $this->db->insert('pembayaran', [
            'id_booking' => $id_booking,
            'jenis_pembayaran' => 'booking',
            'tgl_bayar' => date('Y-m-d'),
            'jumlah' => 500000,
            'metode' => 'cash',
            'status_konfirmasi' => 'diterima'
        ]);

        // update status mobil
        $this->db->where('id_mobil', $id_mobil);
        $this->db->update('mobil', ['status_mobil' => 'booking']);

        redirect('booking');
    }
}