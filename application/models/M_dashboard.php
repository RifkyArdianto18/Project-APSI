<?php
class M_dashboard extends CI_Model {

    public function total_mobil()
    {
        return $this->db->count_all('mobil');
    }

    public function total_pelanggan()
    {
        return $this->db->count_all('pelanggan');
    }

    public function total_booking()
    {
        return $this->db->count_all('booking');
    }

    public function total_penjualan()
    {
        return $this->db->count_all('penjualan');
    }

}