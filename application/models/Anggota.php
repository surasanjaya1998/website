<?php
class Anggota extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListAnggota(){
        return $this->db->get('anggota')->result();
    }
    public function insert($data){
        $result = $this->db->insert('anggota',$data);
        return $result;
    }
    public function delete($kode_anggota){
        $this->db->where('kode_anggota',$kode_anggota);
        $result = $this->db->delete('anggota');
        return $result;
    }
    public function getDataAnggota($kode_anggota){
        $this->db->where('kode_anggota',$kode_anggota);
        return $this->db->get('anggota')->row_array();
    }
    public function update($kode_anggota){
        $data = array(
			'nama' => $this->input->post('nama'),
			'prodi' => $this->input->post('prodi'),
			'jenjang' => $this->input->post('jenjang'),
			'alamat' => $this->input->post('alamat')
		);
        $this->db->where('kode_anggota',$kode_anggota);
        $result = $this->db->update('anggota',$data);
        return $result;
    }
}
?>