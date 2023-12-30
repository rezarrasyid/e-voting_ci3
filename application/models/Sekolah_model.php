<?php 

class Sekolah_model extends CI_Model
{
	private $_table = 'tb_sekolah';

	public function cari_dengan_id_voting($id_sekolah)
	{
	    if (!$id_sekolah) {
	        return null;
	    }
	
	    $sekolah = $this->db->get_where($this->_table, ['id_sekolah' => $id_sekolah]);
	
	    return $sekolah->result();
	}

	public function cari_voting_aktif()
	{
		$sekolah = $this->db->get_where($this->_table, ['status' => 'aktif']);

		return $voting->row();
	}

	public function cari_sekolah()
	{
	    $pemilih = $this->db->get($this->_table);
	
	    return $pemilih->row();
	}

	public function cari_dengan_token($token)
	{
	    if (!$token) {
	        return null;
	    }
	
	    $sekolah = $this->db->get_where($this->_table, ['token' => $token, 'status' => 'aktif']);
	
	    return $sekolah->row();
	}	

	public function update($sekolah)
	{
		if (!$sekolah) {
		        return null;
		    }
		    
		return $this->db->update($this->_table, $sekolah, ['id_sekolah' => $sekolah['id_sekolah']]);
	}

	public function getStatusEvoting() {
        // Implementasi untuk mendapatkan status E-voting dari database
        // Misalnya, menggunakan query SQL
        // Contoh query: SELECT status_evoting FROM evoting_status WHERE id = 1;
        // Gantilah dengan query sesuai dengan struktur tabel di database Anda

        // Contoh sederhana (harap disesuaikan dengan struktur tabel sebenarnya):
        $query = $this->db->get_where($this->_table, array('id_sekolah' => 1));
        $result = $query->row();

        return $result->status;
    }

    public function updateStatusEvoting($status) {
		// Implementasi untuk memperbarui status E-voting di database
		// Misalnya, menggunakan query SQL
		// Contoh query: UPDATE sekolah_status SET status = $status WHERE id_sekolah = 1;
		// Gantilah dengan query sesuai dengan struktur tabel di database Anda
	
		// Contoh sederhana (harap disesuaikan dengan struktur tabel sebenarnya):
		$this->db->where('id_sekolah', 1);
		$this->db->update($this->_table, array('status' => $status));
	}
}

?>