<?php

class Kandidat extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('kandidat_model');
        $this->load->model('kelas_model');
        $this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $data['current_user'] = $this->user_model->current_user();
        $data['kandidat'] = $this->kandidat_model->get_kandidatadmin();
        $this->load->view('admin/kandidat_list.php', $data);
    }

    public function tambah()
    {
        $data['current_user'] = $this->user_model->current_user();
        $data['daftar_kelas'] = $this->kelas_model->get_kelas(); 

        if ($this->input->post('nama_kandidat')) {
            // Generate id_kandidat menggunakan uniqid
            $id_kandidat = uniqid();
            $nis = $this->input->post('nis_kandidat');
        
            // Ambil data dari POST request
            $nama_kandidat = $this->input->post('nama_kandidat');
            $kelas = $this->input->post('kelas_kandidat');
            
            // Konfigurasi untuk upload file
            $config['upload_path'] = './upload/kandidat/'; // Direktori tujuan unggahan
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
            $config['file_name'] = $id_kandidat; // Mengganti nama file dengan ID kandidat
        
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('foto_kandidat')) {
                // Jika upload berhasil
                $upload_data = $this->upload->data(); // Data file yang diunggah
        
                // Ambil nama file yang telah diunggah
                $foto = $upload_data['file_name'];
        
                // Ambil data visi_misi
                $visi_misi = $this->input->post('visi_misi');
        
                // Data untuk dimasukkan ke dalam database
                $data = array(
                    'id_kandidat' => $id_kandidat,
                    'NIS_kandidat' => $nis,
                    'nama_kandidat' => $nama_kandidat,
                    'kelas_kandidat' => $kelas,
                    'foto_kandidat' => $foto,
                    'visi_misi' => $visi_misi
                );
        
                // Memanggil model untuk menyimpan data
                $this->kandidat_model->tambah_kandidat($data);
        
                $this->session->set_flashdata('message', 'Berhasil ditambahkan!');
                redirect('admin/Kandidat');
            } else {
                // Jika upload gagal, tampilkan pesan kesalahan
                $error = $this->upload->display_errors();
                echo $error;
            }
        } else {
            $this->load->view('admin/kandidat_new', $data); // Memuat tampilan form tambah kelas
        }        
    }

    public function edit($id_kandidat)
    {
        if (empty($id_kandidat)) {
            show_404();
        }
        $data['current_user'] = $this->user_model->current_user();
        $data['kandidat'] = $this->kandidat_model->get_kandidat_by_id($id_kandidat);
        $data['daftar_kelas'] = $this->kelas_model->get_kelas();

        if ($this->input->post('nama_kandidat')) {
            // Ambil data dari POST request
            $nis = $this->input->post('nis_kandidat');
            $nama_kandidat = $this->input->post('nama_kandidat');
            $kelas = $this->input->post('kelas_kandidat');
            $visi_misi = $this->input->post('visi_misi');

            // Konfigurasi untuk upload file
            $config['upload_path'] = './upload/kandidat/'; // Direktori tujuan unggahan
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
            $config['file_name'] = $data['kandidat']->id_kandidat; // Gunakan ID kandidat yang sedang di-edit sebagai nama file

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_kandidat')) {
                // Jika upload berhasil
                $upload_data = $this->upload->data();
                $data['foto_kandidat'] = $upload_data['file_name'];
            }

            // Data untuk dimasukkan ke dalam database
            $this->kandidat_model->edit_kandidat($id_kandidat, $nis, $nama_kandidat, $kelas, $visi_misi, $data);

            $this->session->set_flashdata('message', 'Berhasil diubah!');
            redirect('admin/Kandidat');
        } else {
            $this->load->view('admin/kandidat_edit', $data); // Memuat tampilan form edit kandidat
        }
    }

    public function delete($id_kandidat)
    {
        if (empty($id_kandidat)) {
            show_404();
        }

        $this->kandidat_model->hapus_kandidat($id_kandidat);
        $this->session->set_flashdata('message', 'Kandidat dihapus!');
        redirect('admin/Kandidat');
    }

    public function detail($id_kandidat)
    {
        $data['current_user'] = $this->user_model->current_user();
        $this->load->model('Kandidat_model');
        $data['kandidat'] = $this->Kandidat_model->get_kandidat_visimisi($id_kandidat);

        $this->load->view('admin/kandidat_detail', $data);
    }

    public function hapus_semua()
    {
        $data['current_user'] = $this->user_model->current_user();
        $this->kandidat_model->deleteAllData();
        redirect('admin/Kandidat');
    }

}