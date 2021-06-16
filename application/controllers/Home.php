<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('model_barang');

        $data['judul'] = 'SEAWAVE - Home';
        $data['post'] = $this->model_barang->getAllPost();
        $this->load->view('bootstrap5/header', $data);
        $this->load->view('home');
        $this->load->view('bootstrap5/footer');
    }
}
