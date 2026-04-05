<?php
class M_pembayaran extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    public function get_booking()
    {
        $this->db->select('booking.*, pelanggan.nama_pelanggan, mobil.nama_mobil');
        $this->db->from('booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        $this->db->where('booking.status', 'booking');

        return $this->db->get()->result();
    }
}