<?php
class M_auth extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db->get_where('pengguna', [
            'username' => $username,
            'password' => md5($password)
        ])->row();
    }

}