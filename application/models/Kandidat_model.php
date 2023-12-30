<?php
class Kandidat_model extends CI_Model
{
    private $_table = "tb_kandidat";

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }
    
    public function get_kandidat()
    {
        return $this->db->get($this->_table)->result_array(); // Gunakan $_table di sini
    }

    public function get_kandidat_by_id($id_kandidat)
    {
        $this->db->where('id_kandidat', $id_kandidat);
        return $this->db->get($this->_table)->row();
    }

    public function get_kandidat_visimisi($id_kandidat)
    {
        return $this->db->get_where($this->_table, ['id_kandidat' => $id_kandidat])->row_array();
    }

    public function get_kandidatadmin()
    {
        return $this->db->get($this->_table)->result(); // Gunakan $_table di sini
    }

    public function edit_kandidat($id_kandidat, $nis, $nama_kandidat, $kelas, $visi_misi, $data)
    {
        $this->db->trans_start(); // Mulai transaksi database

        // Update data kandidat kecuali foto jika foto diunggah
        $this->db->where('id_kandidat', $id_kandidat);
        $this->db->update($this->_table, array(
            'NIS_kandidat' => $nis,
            'nama_kandidat' => $nama_kandidat,
            'kelas_kandidat' => $kelas,
            'visi_misi' => $visi_misi,
        ));

        // Jika foto diunggah, update juga kolom foto
        if (isset($data['foto_kandidat'])) {
            $this->db->where('id_kandidat', $id_kandidat);
            $this->db->update($this->_table, array('foto_kandidat' => $data['foto_kandidat']));
        }

        $this->db->trans_complete(); // Selesai transaksi database
    }



    public function pilih_kandidat($nis, $id_kandidat) 
    {
        $this->db->set('status', 'sudah');
        $this->db->set('id_kandidat', $id_kandidat);
        $this->db->where('nis', $nis);
        $this->db->update('tb_pemilih');
    }
    
    public function cek_status_pemilih($nis) 
    {
        $query = $this->db->get_where('tb_pemilih', ['nis' => $nis]);
        if ($query->num_rows() > 0) {
            return $query->row()->status;
        }
        return 'belum';
    }

    public function tambah_kandidat($data)
    {
        $this->db->insert($this->_table, $data); // Gunakan $_table di sini
    }

    public function hapus_kandidat($id_kandidat)
    {
        $this->db->where('id_kandidat', $id_kandidat);
        $this->db->delete($this->_table); // Gunakan $_table di sini
    }

    public function jumlah_kandidat() {
        return $this->db->count_all($this->_table);
    }

    public function ambil_pilihan_berdasarkan_id_voting($id_voting)
		{
		    if (!$id_voting) {
		        return array();
		    }
		
		    $pilihan_voting = $this->db->get_where($this->_table, ['id_voting' => $id_voting]);
		
		    return $pilihan_voting->result();
		}

        public function deleteAllData()
        {
            $this->db->empty_table($this->_table);
            return true; // Atau sesuai dengan kebutuhan Anda
        }
    
}
