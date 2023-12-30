<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Siswa extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
        $this->load->model('kelas_model');
        $this->load->library('pagination');
        $this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $config['base_url'] = site_url('/admin/Siswa');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->siswa_model->jumlah_siswa();
		$config['per_page'] = 10; // <-kamu bisa ubah ini

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));
        
        $data['current_user'] = $this->user_model->current_user();
        $data['siswa'] = $this->siswa_model->get_siswa($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/siswa_list.php', $data);
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/Siswa/cari');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->siswa_model->jumlah_siswa();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['current_user'] = $this->user_model->current_user();
        $data['siswa'] = $this->siswa_model->cari_siswa($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/siswa_list.php', $data);
    }


    public function tambah()
    {
        $data['current_user'] = $this->user_model->current_user();
        $data['daftar_kelas'] = $this->kelas_model->get_kelas();

        if ($this->input->post('nama_siswa')) {
            $nis = $this->input->post('nis');

            // Pengecekan apakah NIS sudah ada
            if ($this->siswa_model->cek_nis_exist($nis)) {
                $this->session->set_flashdata('error', 'NIS ' . $nis . ' sudah terdaftar. Silakan gunakan NIS yang berbeda.');
                redirect('admin/Siswa/tambah');
            }

            $id_siswa = uniqid();
            $nama_siswa = $this->input->post('nama_siswa');
            $kelas = $this->input->post('kelas');

            $data = array(
                'id_pemilih' => $id_siswa,
                'NIS' => $nis,
                'Nama' => $nama_siswa,
                'Kelas' => $kelas
            );

            try {
                $this->siswa_model->tambah_siswa($data);
                $this->session->set_flashdata('message', 'Berhasil ditambahkan!');
                redirect('admin/Siswa');
            } catch (\Exception $e) {
                // Tangkap kesalahan dan atur pesan flash untuk notifikasi
                $this->session->set_flashdata('error', 'Gagal menambahkan siswa. ' . $e->getMessage());
                redirect('admin/Siswa');
            }
        } else {
            $this->load->view('admin/siswa_new', $data); 
        }
    }



    public function edit($id_pemilih)
    {
        if (empty($id_pemilih)) {
            show_404();
        }
        $data['current_user'] = $this->user_model->current_user();
        $data['siswa'] = $this->siswa_model->get_siswa_by_id($id_pemilih);

        $data['daftar_kelas'] = $this->kelas_model->get_kelas(); // Mengambil daftar kelas dari model

        if ($this->input->post('nama_siswa')) {
            // Generate id_kelas menggunakan uniqid
            $id_siswa = uniqid();
            $nis = $this->input->post('nis');

            // if ($this->siswa_model->cek_nis_exist($nis)) {
            //     $this->session->set_flashdata('error', 'NIS ' . $nis . ' sudah terdaftar. Silakan gunakan NIS yang berbeda.');
            //     redirect('admin/Siswa/edit');
            // }

            // Ambil data dari POST request
            $nama_siswa = $this->input->post('nama_siswa');
            $kelas = $this->input->post('kelas');

            // Data untuk dimasukkan ke dalam database
            $data = array(
                'id_pemilih' => $id_siswa,
                'NIS' => $nis,
                'Nama' => $nama_siswa,
                'Kelas' => $kelas
            );

            // Memanggil model untuk menyimpan data
            $this->siswa_model->edit_siswa($id_pemilih, $data);

            $this->session->set_flashdata('message', 'Berhasil diubah!');
            redirect('admin/Siswa');
        } else {
            $this->load->view('admin/siswa_edit', $data); 
        }
    }

    public function delete($id_pemilih)
    {
        if (empty($id_pemilih)) {
            show_404();
        }

        $this->siswa_model->hapus_siswa($id_pemilih);
        $this->session->set_flashdata('message', 'Berhasil dihapus!');
        redirect('admin/Siswa');
    } 

    public function import_excel()
    {
        $config['upload_path'] = './upload/excel/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('upload/excel/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numRow > 1) {
                        $datasiswa = array(
                            'id_pemilih'  => uniqid(),
                            'NIS'  => $row->getCellAtIndex(1),
                            'Nama'       => $row->getCellAtIndex(2),
                            'Kelas'       => $row->getCellAtIndex(3),
                            'status'       => $row->getCellAtIndex(4)
                        );
                        if ($this->siswa_model->cek_nis_exist($row->getCellAtIndex(1))) {
                            $this->session->set_flashdata('error', 'NIS ' . $row->getCellAtIndex(1) . ' sudah terdaftar. Silakan gunakan NIS yang berbeda.');
                            redirect('admin/Siswa');
                        }
                        $this->siswa_model->import_data($datasiswa);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('upload/excel/' . $file['file_name']);
                $this->session->set_flashdata('message', 'import Data Berhasil');
                redirect('admin/Siswa');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }

    public function hapus_semua()
    {
        $data['current_user'] = $this->user_model->current_user();
        $this->siswa_model->deleteAllData();
        redirect('admin/Siswa');
    }
}