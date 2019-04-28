<?php
class Buku extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListBuku(){
        return $this->db->get('buku')->result();
    }
    public function insert($data){
        $result = $this->db->insert('buku',$data);
        return $result;
    }
    public function delete($kode_register){
        $this->db->where('kode_register',$kode_register);
        $result = $this->db->delete('buku');
        return $result;
    }
    public function getDataBuku($kode_register){
        $this->db->where('kode_register',$kode_register);
        return $this->db->get('buku')->row_array();
    }
    public function update($kode_register){
        $data = array(
			'judul_buku' => $this->input->post('judul_buku'),
			'pengarang' => $this->input->post('pengarang'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit')
		);
        $this->db->where('kode_register',$kode_register);
        $result = $this->db->update('buku',$data);
        return $result;
    }
}
?>