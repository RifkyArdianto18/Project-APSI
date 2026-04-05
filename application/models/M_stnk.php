<?php
class M_stnk extends CI_Model {

    public function get_penjualan()
    {
        $this->db->select('penjualan.*, pelanggan.nama_pelanggan, mobil.nama_mobil, pengurusan_stnk.id_stnk');
        $this->db->from('penjualan');
        $this->db->join('booking', 'booking.id_booking = penjualan.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');

        $this->db->join('pengurusan_stnk', 'pengurusan_stnk.id_penjualan = penjualan.id_penjualan', 'left');

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('pengurusan_stnk', $data);
    }
}