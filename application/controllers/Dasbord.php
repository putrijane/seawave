narujib
/
laut_kita
1
00
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
laut_kita/application/controllers/Dashboard.php /
@narujib
narujib login
Latest commit 558ca39 17 hours ago
 History
 1 contributor
105 lines (96 sloc)  4.33 KB
  
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Post');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Laut Kita - Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('dashboard/header', $data, $data['user']['nama']);
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/topbar');
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/footer');
    }

    public function tulis_berita()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Laut Kita - Tulis Berita';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('dashboard/header', $data, $data['user']['nama']);
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/topbar');
            $this->load->view('dashboard/tulis_berita');
            $this->load->view('dashboard/footer');
        } else {
            $this->M_Post->kirimBerita();
            $this->session->set_flashdata('flash', 'Publish');
            redirect('dashboard/list_berita');
        }
    }

    public function list_berita()
    {
        $data['judul'] = 'Laut Kita - List Berita';
        $data['post'] = $this->M_Post->getAllPost();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('dashboard/header', $data, $data['user']['nama']);
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/topbar');
        $this->load->view('dashboard/list_berita');
        $this->load->view('dashboard/footer');
    }

    public function kategori()
    {
        $data['judul'] = 'Laut Kita - Kategori Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('dashboard/header', $data, $data['user']['nama']);
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/topbar');
        $this->load->view('dashboard/kategori');
        $this->load->view('dashboard/footer');
    }

    public function pengajuan()
    {
        $data['judul'] = 'Laut Kita - Pengajuan Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('dashboard/header', $data, $data['user']['nama']);
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/topbar');
        $this->load->view('dashboard/pengajuan');
        $this->load->view('dashboard/footer');
    }

    public function hapus($id)
    {
        $this->M_Post->hapusBerita($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('dashboard/list_berita');
    }

    public function edit_berita($id)
    {
        $data['judul'] = 'SEAWAVE - Edit Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['post'] = $this->M_Post->getPostbyId($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/header', $data, $data['user']['nama']);
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/topbar');
            $this->load->view('dashboard/edit_berita', $data);
            $this->load->view('dashboard/footer');
        } else {
            $this->M_Post->editBerita();
            $this->session->set_flashdata('flash', 'Edit');
            redirect('dashboard/list_berita');
        }
    }
}
