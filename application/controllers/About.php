<?php defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Laut Kita - Home';
        $this->load->view('bootstrap5/header', $data);
        $this->load->view('about');
        $this->load->view('bootstrap5/footer');
    }
}