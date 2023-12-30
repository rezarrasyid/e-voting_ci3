<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('sekolah_model');
        $this->load->model('siswa_model');
        $this->load->model('kandidat_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

	public function index()
{
    $data['current_user'] = $this->user_model->current_user();
    $data['sekolah'] = $this->sekolah_model->cari_sekolah();
    $data['status'] = $this->sekolah_model->getStatusEvoting();

    $this->load->view('admin/sekolah', $data);

    if ($this->input->method() === 'post') {
        $judul_sekolah = $this->input->post('judul_sekolah');

        if (!empty($_FILES['tema']['name'])) {
            // Pengaturan untuk upload tema
            $config_tema['upload_path'] = FCPATH . 'upload/tema/';
            $config_tema['allowed_types'] = 'gif|jpg|jpeg|png';
            $config_tema['file_name'] = $judul_sekolah . '_' . $_FILES['tema']['name'];

            $this->load->library('upload', $config_tema);

            if ($this->upload->do_upload('tema')) {
                $tema = $this->upload->data('file_name');
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }

        if (!empty($_FILES['logo']['name'])) {
            // Pengaturan untuk upload logo
            $config_logo['upload_path'] = FCPATH . 'upload/logo/';
            $config_logo['allowed_types'] = 'gif|jpg|jpeg|png';
            $config_logo['file_name'] = $judul_sekolah . '_' . $_FILES['logo']['name'];

            $this->load->library('upload', $config_logo);

            if ($this->upload->do_upload('logo')) {
                $logo_sekolah = $this->upload->data('file_name');
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
        }

        // Jika tidak ada gambar yang diunggah, simpan data tanpa mengubah gambar
        $tema = isset($tema) ? $tema : $data['sekolah']->tema;
        $logo_sekolah = isset($logo_sekolah) ? $logo_sekolah : $data['sekolah']->logo_sekolah;

        $sekolah = [
            'id_sekolah' => 1,
            'judul_sekolah' => $judul_sekolah,
            'logo_sekolah' => $logo_sekolah,
            'tema' => $tema
        ];

        $terupdate = $this->sekolah_model->update($sekolah);

        if ($terupdate) {
            $this->session->set_flashdata('message', 'Aplikasi diubah!');
            redirect('admin/sekolah');
        }
    }
}

	public function temabawaan()
	{
		$css = $this->input->get('css');

		$sekolah = [
			'id_sekolah' => 1,
			'tema' => $css
		];

		$update = $this->sekolah_model->update($sekolah);

		if ($update) {
			$this->session->set_flashdata('message', 'Aplikasi di ganti !');
			redirect('admin/sekolah');
		}
	}

    public function toggle_status() {
        // Mengambil nilai status dari form
        $status_evoting = $this->input->post('status_aktif') ? 'aktif' : 'nonaktif';
    
        // Memperbarui status E-voting di database
        $this->sekolah_model->updateStatusEvoting($status_evoting);
    
        // Mengalihkan kembali ke halaman sebelumnya
        $this->session->set_flashdata('message', 'Aplikasi di perbarui !');
        redirect('admin/sekolah');
    }        

}
	
