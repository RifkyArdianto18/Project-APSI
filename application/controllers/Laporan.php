<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_laporan');
    }

    public function penjualan()
    {
        $data['data'] = $this->M_laporan->penjualan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/penjualan', $data);
        $this->load->view('templates/footer');
    }

    public function kwitansi($id)
    {
        $this->db->select('pembayaran.*, pelanggan.nama_pelanggan, mobil.nama_mobil');
        $this->db->from('pembayaran');

        $this->db->join('booking', 'booking.id_booking = pembayaran.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');

        $this->db->where('pembayaran.id_pembayaran', $id);

        $data['d'] = $this->db->get()->row();

        if (!$data['d']) {
            echo "Data kwitansi tidak ditemukan!";
            die();
        }

        $this->load->view('laporan/kwitansi', $data);
    }

    public function kwitansi_pdf($id)
    {
        $this->db->select('pembayaran.*, pelanggan.nama_pelanggan, mobil.nama_mobil');
        $this->db->from('pembayaran');
        $this->db->join('booking', 'booking.id_booking = pembayaran.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        $this->db->where('pembayaran.id_pembayaran', $id);

        $data['d'] = $this->db->get()->row();

        if (!$data['d']) {
            echo "Data tidak ditemukan";
            die();
        }

        // load view jadi HTML
        $html = $this->load->view('laporan/kwitansi', $data, true);

        // DOMPDF
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
        $dompdf = new Dompdf\Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("kwitansi.pdf", array("Attachment" => false));
    }
}