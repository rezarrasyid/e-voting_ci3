<?php

class Siswa_model extends CI_Model
{
    private $_table = 'tb_pemilih'; // Nama tabel telah dideklarasikan di sini

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_siswa($limit = null, $offset = null)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->_table)->result(); // Gunakan $_table di sini
    }

    public function get_siswa_by_nis($nis)
    {
        $this->db->where('NIS', $nis);
        return $this->db->get($this->_table)->row_array();
    }

    public function get_siswa_by_id($id_pemilih)
    {
        $this->db->where('id_pemilih', $id_pemilih);
        return $this->db->get($this->_table)->row();
    }

    public function pemilih_terdaftar($id_voting)
	{
	    $pemilih = $this->db->get_where($this->_table, ['id_voting' => $id_voting]);
	
	    return $pemilih->result();
	}

    public function cari_siswa($limit, $offset)
    {
        $q = html_escape($this->input->get('q'));
        $this->db->like('NIS', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Kelas', $q);
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->_table);
        return $query->result();
    }


    public function tambah_siswa($data)
    {
        try {
            $this->db->insert($this->_table, $data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan siswa. ' . $e->getMessage());
        }
}


    public function ubah_status_sudah($nis)
    {
        $this->db->where('NIS', $nis);
        $this->db->update($this->_table, array('status' => 'sudah'));
        return $this->db->affected_rows() > 0;
    }


    public function edit_siswa($id_pemilih, $data)
    {
        $this->db->where('id_pemilih', $id_pemilih);
        $this->db->update($this->_table, $data); 
    }

    public function hapus_siswa($id_pemilih)
    {
        $this->db->where('id_pemilih', $id_pemilih);
        $this->db->delete($this->_table); // Gunakan $_table di sini
    }

    public function reset_status_siswa($nis)
    {
        // Update status siswa yang sudah memilih menjadi "belum memilih"
        $this->db->where('NIS', $nis);
        $this->db->set('status', 'belum');
        $this->db->update($this->_table);
    }

    public function jumlah_siswa() {
        return $this->db->count_all($this->_table);
    }

    public function jumlah_siswa_sudah() {
        $this->db->where('status', 'sudah');
        return $this->db->count_all_results($this->_table);
    }    

    public function jumlah_siswa_belum() {
        $this->db->where('status', 'belum');
        return $this->db->count_all_results($this->_table);
    }    

    public function import_data($datasiswa)
    {
        $jumlah = count($datasiswa);
        if ($jumlah > 0) {
            $this->db->replace($this->_table, $datasiswa);
        }
    }

    public function deleteAllData()
    {
        $this->db->empty_table($this->_table);
        return true; // Atau sesuai dengan kebutuhan Anda
    }

    public function resetAllData()
    {
        $this->db->set('status', 'belum');
        $this->db->update($this->_table);
        return true; // Atau sesuai dengan kebutuhan Anda
    }

    public function cek_nis_exist($nis)
    {
        $this->db->where('NIS', $nis);
        $query = $this->db->get($this->_table);
        return $query->num_rows() > 0;
    }

}
