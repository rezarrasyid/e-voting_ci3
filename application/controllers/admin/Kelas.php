<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Kelas extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('kelas_model');
        $this->load->library('pagination');
        $this->load->model('user_model');
		if(!$this->user_model->current_user()){
			redirect('auth/login_admin');
		}
	}

    public function index()
    {
        $config['base_url'] = site_url('/admin/Kelas');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->kelas_model->jumlah_kelas();
		$config['per_page'] = 5; 

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));

        $data['current_user'] = $this->user_model->current_user();
        $data['kelas'] = $this->kelas_model->get_kelas($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/kelas_list.php', $data);
    }

    public function cari()
    {
        $config['base_url'] = site_url('/admin/Kelas/cari');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->kelas_model->jumlah_kelas();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));

        $data['current_user'] = $this->user_model->current_user();
        $data['kelas'] = $this->kelas_model->cari_kelas($limit, $offset);
        $data['offset'] = $offset;

        $this->load->view('admin/kelas_list.php', $data);
    }

    public function tambah()
    {
        if ($this->input->post('nama_kelas')) {
            $id_kelas = uniqid();
            $nama_kelas = $this->input->post('nama_kelas');
            $token = $this->input->post('token');

            if ($this->kelas_model->cek_nama_kelas($nama_kelas)) {
                $this->session->set_flashdata('error', 'Kelas ' . $nama_kelas . ' sudah terdaftar. Silakan gunakan Nama kelas yang berbeda.');
                redirect('admin/Kelas/tambah');
            }

            // Data untuk dimasukkan ke dalam database
            $data = array(
                'id_kelas' => $id_kelas,
                'Nama_kelas' => $nama_kelas,
                'token' => $token
            );


            // Memanggil model untuk menyimpan data
            $this->kelas_model->tambah_kelas($data);

            $this->session->set_flashdata('message', 'Berhasil ditambahkan!');
            redirect('admin/Kelas');
        } else {
            $data['current_user'] = $this->user_model->current_user();
            $this->load->view('admin/kelas_new', $data); // Memuat tampilan form tambah kelas
        }
    }

    public function edit($id_kelas)
    {
        if (empty($id_kelas)) {
            show_404();
        }

        $data['current_user'] = $this->user_model->current_user();

        // Ambil data kelas berdasarkan id_kelas
        $data['kelas'] = $this->kelas_model->get_kelas_by_id($id_kelas);

        if ($this->input->post('nama_kelas')) {
            // Ambil data dari POST request
            $nama_kelas = $this->input->post('nama_kelas');
            $token = $this->input->post('token');

            if ($this->kelas_model->cek_nama_kelas($nama_kelas)) {
                $this->session->set_flashdata('error', 'Kelas ' . $nama_kelas . ' sudah terdaftar. Silakan gunakan Nama kelas yang berbeda.');
                redirect('admin/Kelas/edit/' . $id_kelas);
            }

            // Data untuk diperbarui dalam database
            $data_to_update = array(
                'Nama_kelas' => $nama_kelas,
                'token' => $token
            );

            // Memanggil model untuk menyimpan perubahan data
            $this->kelas_model->edit_kelas($id_kelas, $data_to_update);

            $this->session->set_flashdata('message', 'Berhasil diubah!');
            redirect('admin/Kelas');
        } else {
            $this->load->view('admin/kelas_edit', $data); // Memuat tampilan form edit kelas
        }
    }


    public function delete($id_kelas)
    {
        if (empty($id_kelas)) {
            show_404();
        }

        $this->kelas_model->hapus_kelas($id_kelas);
        $this->session->set_flashdata('message', 'Data dihapus!');
        redirect('admin/Kelas');
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
                        $datakelas = array(
                            'id_kelas'  => uniqid(),
                            'Nama_kelas'  => $row->getCellAtIndex(1)
                        );
                        $this->kelas_model->import_data($datakelas);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('upload/excel/' . $file['file_name']);
                $this->session->set_flashdata('message', 'import Data Berhasil');
                redirect('admin/Kelas');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }

    public function hapus_semua()
    {
        $data['current_user'] = $this->user_model->current_user();
        $this->kelas_model->deleteAllData();
        redirect('admin/Kelas');
    }

}
