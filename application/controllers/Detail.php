<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function index($id)
    {
        $this->load->model('M_Post');

        $data['judul'] = 'SEAWAVE- Post';
        $data['post'] = $this->M_Post->getPostbyId($id);
        $this->load->view('bootstrap5/header', $data);
        $this->load->view('detail', $data);
        $this->load->view('bootstrap5/footer');
    }
}