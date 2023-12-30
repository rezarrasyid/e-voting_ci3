<?php

class Pilihan_model extends CI_Model
{
    private $_table = 'tb_pilihan'; // Nama tabel telah dideklarasikan di sini

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function get_pilihan()
    {
        return $this->db->get($this->_table)->result(); // Gunakan $_table di sini
    }

    public function simpan_pemilihan($id, $nis, $id_kandidat)
    {
        $data = array(
            'id_pilihan' => $id,
            'NIS' => $nis,
            'id_kandidat' => $id_kandidat,
            'created_at' => date('Y-m-d H:i:s')
        );

        return $this->db->insert($this->_table, $data);
    }

    public function hapus_pilihan($nis)
    {
        $this->db->where('NIS', $nis);
        $this->db->delete($this->_table); // Gunakan $_table di sini
    }

    public function get_jumlah_memilih_kandidat($id_kandidat)
    {
        $this->db->where('id_kandidat', $id_kandidat);
        return $this->db->count_all_results($this->_table);
    }

    public function getTotalPemilih() {
        return $this->db->count_all_results($this->_table);
    }

    public function getJumlahSiswaMemilih($id_kandidat)
    {
        $this->db->where('id_kandidat', $id_kandidat);
        $query = $this->db->get($this->_table);

        return $query->num_rows();
    }

    


}
