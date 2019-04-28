<?php
class Petugas extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListPetugas(){
        return $this->db->get('petugas')->result();
    }
    public function insert($data){
        $result = $this->db->insert('petugas',$data);
        return $result;
    }
    public function delete($kode_petugas){
        $this->db->where('kode_petugas',$kode_petugas);
        $result = $this->db->delete('petugas');
        return $result;
    }
    public function getDataPetugas($kode_petugas){
        $this->db->from('petugas');
        $this->db->where('kode_petugas',$kode_petugas);
        return $this->db->get()->row_array();
    }
    public function update($kode_petugas){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        
        $this->db->set('nama',$nama);
        $this->db->set('alamat',$alamat);
        $this->db->where('kode_petugas',$kode_petugas);
        $result = $this->db->update('petugas');
        return $result;
    }
}
?>