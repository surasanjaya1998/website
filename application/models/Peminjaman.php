<?php
class Peminjaman extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListPeminjaman(){
        return $this->db->get('peminjaman')->result();
    }
    public function insert($data){
        $result = $this->db->insert('peminjaman',$data);
        return $result;
    }
    public function delete($kode_pinjam){
        $this->db->where('kode_pinjam',$kode_pinjam);
        $result = $this->db->delete('peminjaman');
        if($result){
            $this->db->where('kode_pinjam',$kode_pinjam);
            $result = $this->db->delete('detail_pinjam');
        }
        return $result;
    }
    public function getDataPeminjaman($kode_pinjam){
        $this->db->where('kode_pinjam',$kode_pinjam);
        return $this->db->get('peminjaman')->row_array();
    }
    public function update($kode_pinjam){
        $data = array(
			'kode_anggota' => $this->input->post('kode_anggota'),
			'kode_petugas' => $this->input->post('kode_petugas'),
		);
        $this->db->where('kode_pinjam',$kode_pinjam);
        $result = $this->db->update('peminjaman',$data);
        return $result;
    }
}
?>