<?php
class M_bpkb extends CI_Model {

    public function get_data()
    {
        $this->db->select('penjualan.*, pelanggan.nama_pelanggan, mobil.nama_mobil, pengurusan_bpkb.id_bpkb, pengurusan_bpkb.status');
        $this->db->from('penjualan');
        $this->db->join('booking', 'booking.id_booking = penjualan.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        $this->db->join('pengurusan_bpkb', 'pengurusan_bpkb.id_penjualan = penjualan.id_penjualan', 'left');

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('pengurusan_bpkb', $data);
    }

    public function update($id_penjualan, $data)
    {
        $this->db->where('id_penjualan', $id_penjualan);
        return $this->db->update('pengurusan_bpkb', $data);
    }
}