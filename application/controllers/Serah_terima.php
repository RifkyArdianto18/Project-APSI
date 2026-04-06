<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serah_terima extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_serah');
    }

    public function index()
    {
        $data['penjualan'] = $this->M_serah->get_penjualan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('serah/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses($id_penjualan)
    {
        $data['penjualan'] = $this->M_serah->get_detail($id_penjualan);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('serah/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $metode = $this->input->post('metode');

        // upload foto
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        $foto = '';

        if ($this->upload->do_upload('bukti')) {
            $file = $this->upload->data();
            $foto = $file['file_name'];
        }

        $data = [
            'id_penjualan' => $id_penjualan,
            'tanggal_serah' => date('Y-m-d'),
            'metode' => $metode,
            'alamat_kirim' => $metode == 'kirim' ? $this->input->post('alamat') : NULL,
            'surat_jalan' => $metode == 'kirim' ? 'SJ-' . time() : NULL,
            'bukti_foto' => $foto
        ];

        $this->M_serah->insert($data);

        // 🔥 update status penjualan
        $this->db->where('id_penjualan', $id_penjualan);
        $this->db->update('penjualan', [
            'status_penyerahan' => 'selesai'
        ]);

        redirect('serah_terima');
    }
}