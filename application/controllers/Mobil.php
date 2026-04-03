<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('M_mobil');
    }

    public function index()
    {
        $data['mobil'] = $this->M_mobil->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mobil/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mobil/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nama_mobil' => $this->input->post('nama_mobil'),
            'merk' => $this->input->post('merk'),
            'tipe' => $this->input->post('tipe'),
            'warna' => $this->input->post('warna'),
            'tahun' => $this->input->post('tahun'),
            'harga_jual' => $this->input->post('harga_jual'),
            'status_mobil' => 'tersedia'
        ];

        $this->M_mobil->insert($data);
        redirect('mobil');
    }

    public function edit($id)
    {
        $data['mobil'] = $this->M_mobil->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mobil/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'nama_mobil' => $this->input->post('nama_mobil'),
            'merk' => $this->input->post('merk'),
            'tahun' => $this->input->post('tahun'),
            'harga' => $this->input->post('harga')
        ];

        $this->M_mobil->update($id, $data);
        redirect('mobil');
    }

    public function delete($id)
    {
        $this->M_mobil->delete($id);
        redirect('mobil');
    }
}