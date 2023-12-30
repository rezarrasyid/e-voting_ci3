<?php

class Status extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
        $this->load->model('pilihan_model');
        $this->load->library('pagination');
        $this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $config['base_url'] = site_url('/admin/Status');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->siswa_model->jumlah_siswa();
		$config['per_page'] = 10; // <-kamu bisa ubah ini

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

        $data['current_user'] = $this->user_model->current_user();
        $data['siswa'] = $this->siswa_model->get_siswa($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/status_list.php', $data);
    }

    public function reset($nis)
    {
        // Panggil model untuk melakukan reset status siswa
        $this->siswa_model->reset_status_siswa($nis);
        $this->pilihan_model->hapus_pilihan($nis);

        $this->session->set_flashdata('message', 'Berhasil direset!');
        redirect('admin/Status');
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/Status/cari');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->siswa_model->jumlah_siswa();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['current_user'] = $this->user_model->current_user();
        $data['siswa'] = $this->siswa_model->cari_siswa($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/status_list.php', $data);
    }

    public function reset_semua()
    {
        $data['current_user'] = $this->user_model->current_user();
        $this->siswa_model->resetAllData();
        redirect('admin/Status');
    }
}