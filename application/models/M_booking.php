<?php
class M_booking extends CI_Model {

    public function get_all()
    {
        $this->db->select('booking.*, pelanggan.nama_pelanggan, mobil.nama_mobil');
        $this->db->from('booking');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = booking.id_pelanggan');
        $this->db->join('mobil', 'mobil.id_mobil = booking.id_mobil');
        return $this->db->get()->result();
    }

    public function get_pelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    public function get_mobil()
    {
        return $this->db->where('status_mobil', 'tersedia')->get('mobil')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('booking', $data);
    }
}