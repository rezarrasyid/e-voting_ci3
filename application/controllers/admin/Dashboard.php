<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
		$this->load->model('kandidat_model');
		$this->load->model('pilihan_model');
		$this->load->model('profile_model');
		$this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

	public function index()
	{
		$data = [
			"jumlah_siswa" => $this->siswa_model->jumlah_siswa(),
			"jumlah_siswa_sudah" => $this->siswa_model->jumlah_siswa_sudah(),
			"jumlah_siswa_belum" => $this->siswa_model->jumlah_siswa_belum(),
			"jumlah_kandidat" => $this->kandidat_model->jumlah_kandidat(),
		];
		
		$data['current_user'] = $this->user_model->current_user();
		$data['pilihan'] = $this->pilihan_model->get_pilihan();
		$data['data_kandidat'] = $this->kandidat_model->get_kandidatadmin();
		
		$this->load->view('admin/dashboard.php', $data);
	}

	public function hapus_semua_data()
    {
		$data = [
			"jumlah_siswa" => $this->siswa_model->jumlah_siswa(),
			"jumlah_siswa_sudah" => $this->siswa_model->jumlah_siswa_sudah(),
			"jumlah_siswa_belum" => $this->siswa_model->jumlah_siswa_belum(),
			"jumlah_kandidat" => $this->kandidat_model->jumlah_kandidat(),
		];
		
		$data['current_user'] = $this->user_model->current_user();
		$data['pilihan'] = $this->pilihan_model->get_pilihan();
		$data['data_kandidat'] = $this->kandidat_model->get_kandidatadmin();
        $this->profile_model->deleteAllDatatable();
        $this->load->view('admin/dashboard', $data);
    }
}
