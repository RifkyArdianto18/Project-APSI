<?php
class M_laporan extends CI_Model {

    public function penjualan()
    {
        $this->db->select('penjualan.*, pelanggan.nama_pelanggan, mobil.nama_mobil, pembayaran.id_pembayaran');
        $this->db->from('penjualan');
        $this->db->join('booking', 'booking.id_booking = penjualan.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');

        $this->db->join('pembayaran', 'pembayaran.id_booking = booking.id_booking', 'left');

        return $this->db->get()->result();
    }
}