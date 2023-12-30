<?php
class Auth_model extends CI_Model
{
    private $_table = "tb_pemilih";

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    public function login($nis)
    {
        // Cek apakah NIS ada dalam tabel tb_pemilih
        $this->db->where('NIS', $nis);
        $query = $this->db->get($this->_table);

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Pengguna ditemukan, kembalikan data pengguna
        } else {
            return false; // Pengguna tidak ditemukan
        }
    }

    
    public function get_siswa($nis)
    {
        $query = $this->db->get_where($this->_table, array('NIS' => $nis));
        return $query->row_array();
    }

    public function get_siswa_by_nis($nis)
    {
        $this->db->where('NIS', $nis);
        return $this->db->get($this->_table)->row_array();
    }

    public function validate_token_by_nis($token, $nis)
    {
        // Sesuaikan dengan nama tabel dan struktur kolom di database
        $this->db->select('k.id_kelas');
        $this->db->from('tb_kelas k');
        $this->db->join('tb_siswa s', 'k.nis = s.nis', 'left'); // Melakukan join dengan tabel siswa berdasarkan NIS
        $this->db->where('k.token', $token);
        $this->db->where('s.nis', $nis);
        $query = $this->db->get();

        return $query->num_rows() > 0;
    }
}
