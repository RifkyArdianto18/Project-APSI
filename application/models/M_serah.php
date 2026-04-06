<?php
class M_serah extends CI_Model {

    public function get_penjualan()
    {
        $this->db->select('penjualan.*, pelanggan.nama_pelanggan, mobil.nama_mobil');
        $this->db->from('penjualan');
        $this->db->join('booking', 'booking.id_booking = penjualan.id_booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        $this->db->where('status_penyerahan', 'siap');

        return $this->db->get()->result();
    }

    public function get_detail($id)
    {
        return $this->db->get_where('penjualan', ['id_penjualan' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('serah_terima', $data);
    }
}