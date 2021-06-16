<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
		{
			$this->load->model('model_barang');
	
			$data['judul'] = 'SEAWAVE - Home';
			$this->load->view('');
			$this->load->view('home');
			$this->load->view('footer');
		}
	}
