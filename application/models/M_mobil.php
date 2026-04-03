<?php
class M_mobil extends CI_Model {

    public function get_all()
    {
        return $this->db->get('mobil')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('mobil', $data);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('mobil', ['id_mobil' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_mobil', $id);
        return $this->db->update('mobil', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('mobil', ['id_mobil' => $id]);
    }
}