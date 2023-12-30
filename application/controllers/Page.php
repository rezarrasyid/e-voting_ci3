<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->model('sekolah_model');
		$voting = $this->sekolah_model->cari_sekolah();
		$data['tema'] = $voting->tema;
		$data['sekolah'] = $voting;

		
		if ($voting->status == 'nonaktif') {
			$this->load->view('home_nonaktif', $voting, $data);
		} else {
			$data['sekolah'] = $voting;
			$data['tema'] = $voting->tema;
			$this->load->view('home', $data);
		}
	}

	// public function pilih()
	// {
	// 	$this->load->model('sekolah_model');
	// 	$voting = $this->sekolah_model->cari_sekolah();
	// 	$data['tema'] = $voting->tema;
	// 	$data['sekolah'] = $voting;

		
	// 	// Check status
	// 	if ($voting->status == 'nonaktif') {
	// 		// Jika status nonaktif, arahkan ke halaman home_nonaktif.php
	// 		$this->load->view('home_nonaktif', $voting, $data);
	// 	} else {
	// 		// Jika status aktif, tampilkan halaman home.php
	// 		$data['sekolah'] = $voting;
	// 		$data['tema'] = $voting->tema;
	// 		$this->load->view('pilihkandidat', $data);
	// 	}
	// }
}
