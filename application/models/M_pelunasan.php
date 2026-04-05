<?php
class M_pelunasan extends CI_Model {

    public function get_penjualan()
    {
        $this->db->select('penjualan.*, pelanggan.nama_pelanggan, mobil.nama_mobil, mobil.harga_jual');
        $this->db->from('penjualan');
        $this->db->join('booking', 'booking.id_booking = penjualan.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');

        return $this->db->get()->result();
    }

    public function insert_pelunasan($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}