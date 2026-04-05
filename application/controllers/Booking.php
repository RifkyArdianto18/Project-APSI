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
        $data = [
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pengguna' => $this->session->userdata('id_pengguna'),
            'id_mobil' => $this->input->post('id_mobil'),
            'tgl_booking' => date('Y-m-d'),
            'batas_dp' => date('Y-m-d', strtotime('+7 days')),
            'status' => 'booking'
        ];

        $this->M_booking->insert($data);

        // update status mobil
        $this->db->where('id_mobil', $this->input->post('id_mobil'));
        $this->db->update('mobil', ['status_mobil' => 'booking']);

        redirect('booking');
    }
}