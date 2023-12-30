<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Kandidat_model');
        $this->load->library('session'); // Memuat library session
    }

    public function login()
    {
        $this->load->model('sekolah_model');
		$voting = $this->sekolah_model->cari_sekolah();
        $data['sekolah'] = $this->sekolah_model->cari_sekolah();
		$data['tema'] = $voting->tema;

        $this->load->model('auth_model');
        $nis = $this->input->post('nis');

        if($voting->status == 'nonaktif') {
            $this->load->view('home_nonaktif');
        } else {

        // Cek apakah NIS ada dalam tabel siswa
        $siswa = $this->auth_model->get_siswa($nis);

        if ($siswa) {
            $this->session->set_userdata('nis', $nis);

            $data['siswa'] = $siswa;
            $this->load->view('home', $data);
        } else {
            $this->session->set_flashdata('message_login_error', 'Data siswa tidak ditemukan.');
            $this->load->view('home', $data);
        }
    }
    }

    public function pilih()
    {
        $this->load->model('Kandidat_model');
        $data['kandidat'] = $this->Kandidat_model->get_kandidat();

        $this->load->model('sekolah_model');
		$voting = $this->sekolah_model->cari_sekolah();
		$data['tema'] = $voting->tema;
		$data['sekolah'] = $voting;

        if ($voting->status == 'nonaktif'){
            $this->load->view('home_nonaktif');
        } else {

		
		// Check status
		if ($voting->status == 'nonaktif') {
			// Jika status nonaktif, arahkan ke halaman home_nonaktif.php
			$this->load->view('home_nonaktif', $voting, $data);
		} else {
			// Jika status aktif, tampilkan halaman home.php
			$data['sekolah'] = $voting;
			$data['tema'] = $voting->tema;
			$this->load->view('pilihkandidat', $data);
		}
    }
    }

    public function pilih_kandidat($id_kandidat)
    {
        $this->load->model('Siswa_model');
        $this->load->model('Pilihan_model');
        $id = uniqid('', true);

        // Pastikan siswa yang telah login dan statusnya "belum"
        $nis = $this->session->userdata('nis');
        $siswa = $this->Siswa_model->get_siswa_by_nis($nis);


        if (!empty($siswa) && $siswa['status'] == 'belum') {
            // Simpan pemilihan kandidat ke dalam tabel pemilihan
            $this->Pilihan_model->simpan_pemilihan($id, $nis, $id_kandidat);

            // Ubah status siswa menjadi "sudah"
            $this->Siswa_model->ubah_status_sudah($nis);
            
            $this->session->set_flashdata('message', 'Anda berhasil memilih kandidat.');
            redirect('auth/login');
        } else {
            // Jika siswa sudah memilih atau data siswa tidak ditemukan
            $this->session->set_flashdata('message', 'Anda sudah memilih atau data siswa tidak ditemukan.');
            redirect('auth/login');
        }
    }

    public function visi_misi($id_kandidat)
    {
        $this->load->model('Kandidat_model');
        $this->load->model('sekolah_model');
		$voting = $this->sekolah_model->cari_sekolah();
		$data['tema'] = $voting->tema;
		$data['sekolah'] = $voting;
        $data['kandidat'] = $this->Kandidat_model->get_kandidat_visimisi($id_kandidat);

        if ($voting->status == 'nonaktif'){
            $this->load->view('home_nonaktif');
        } else {

        $this->load->view('visi_misi', $data);
        }   
    }

    public function selesai()
    {
        $this->load->view('terima_kasih');
    }

    public function login_admin()
	{
		$this->load->model('user_model');
		$this->load->library('form_validation');

		$rules = $this->user_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login_form');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->user_model->login($username, $password)){
			redirect('admin');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('login_form');
	}

	public function logout_admin()
	{
		$this->load->model('user_model');
		$this->user_model->logout();
		redirect('auth/login_admin');
	}

    public function token()
    {
        $nis = $this->session->userdata('nis');

        if ($nis) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('token', 'Token Kelas', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form validation gagal, kembalikan ke halaman token
                $this->load->view('token_form.php');
            } else {
                $this->load->model('auth_model');
                // Dapatkan data siswa berdasarkan NIS
                $data_siswa = $this->auth_model->get_siswa_by_nis($nis);

                if ($data_siswa) {
                    // Tampilkan halaman form token
                    $this->load->view('token_form.php', $data_siswa);
                } else {
                    // Jika data siswa tidak ditemukan
                    $this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
                    redirect('auth/login');
                }
            }
        } else {
            // Jika NIS tidak ada dalam sesi, arahkan ke halaman login
            redirect('auth/login');
        }
    }


    public function proses_token()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('token', 'Token Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika form validation gagal, kembalikan ke halaman token
            redirect('auth/token');
        } else {
            $nis = $this->input->post('nis');
            $token = $this->input->post('token');

            $this->load->model('auth_model');

            // Validasi token di dalam model
            $is_valid_token = $this->auth_model->validate_token_by_nis($token, $nis);

            if ($is_valid_token) {
                // Token valid, lakukan proses selanjutnya, misalnya, tampilkan halaman pemilihan kandidat
                redirect('auth/pilih');
            } else {
                $this->session->set_flashdata('error', 'Token tidak valid.');
                redirect('auth/token');
            }
        }
    }

}
