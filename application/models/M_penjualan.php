<?php
class M_penjualan extends CI_Model {

    public function get_booking_dp()
    {
        $this->db->select('booking.*, pelanggan.nama_pelanggan, mobil.nama_mobil, mobil.harga_jual');
        $this->db->from('booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        $this->db->where('booking.status', 'dp');

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('penjualan', $data);
    }
}