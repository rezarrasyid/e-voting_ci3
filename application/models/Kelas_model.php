<?php

class Kelas_model extends CI_Model
{
    private $_table = 'tb_kelas'; // Nama tabel telah dideklarasikan di sini

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_kelas($limit = null, $offset = null)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->_table)->result(); // Gunakan $_table di sini
    }

    public function get_kelas_by_id($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get($this->_table); // Gantilah $_table dengan nama tabel yang sesuai
        return $query->row(); // Mengembalikan satu baris data
    }

    public function cari_kelas($limit, $offset)
    {
        $k = html_escape($this->input->get('k'));
        $this->db->like('Nama_kelas', $k);
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->_table);
        return $query->result();
    }


    public function tambah_kelas($data)
    {
        $this->db->insert($this->_table, $data); // Gunakan $_table di sini
    }

    public function edit_kelas($id, $data)
    {
        $this->db->where('id_kelas', $id);
        $this->db->update($this->_table, $data); // Gunakan $_table di sini
    }

    public function hapus_kelas($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete($this->_table); // Gunakan $_table di sini
    }

    public function jumlah_kelas() {
        return $this->db->count_all($this->_table);
    }

    public function import_data($datakelas)
    {
        $jumlah = count($datakelas);
        if ($jumlah > 0) {
            $this->db->replace($this->_table, $datakelas);
        }
    }

    public function deleteAllData()
    {
        $this->db->empty_table($this->_table);
        return true; 
    }

    public function cek_nama_kelas($nama_kelas)
    {
        $this->db->where('Nama_kelas', $nama_kelas);
        $query = $this->db->get($this->_table);
        return $query->num_rows() > 0;
    }
}
