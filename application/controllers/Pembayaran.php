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

        $data = [
            'id_booking' => $id_booking,
            'id_penjualan' => NULL,
            'jenis_pembayaran' => 'dp',
            'tgl_bayar' => date('Y-m-d'),
            'jumlah' => $this->input->post('jumlah'),
            'metode' => $this->input->post('metode'),
            'status_konfirmasi' => 'pending',
            'bukti_transfer' => $file_name
        ];

        $this->M_pembayaran->insert($data);

        // 🔥 UPDATE STATUS BOOKING
        $this->db->where('id_booking', $id_booking);
        $this->db->update('booking', ['status' => 'dp']);

        redirect('booking');
    }
}