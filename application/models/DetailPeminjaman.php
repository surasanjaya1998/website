<?php
class DetailPeminjaman extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getListDetailPeminjaman($kode_pinjam){
        $this->db->where('kode_pinjam',$kode_pinjam);
        return $this->db->get('detail_pinjam')->result();
    }
    public function insert($data){
        $result = $this->db->insert('detail_pinjam',$data);
        return $result;
    }
    public function getDataPeminjaman($kode_pinjam){
        $this->db->where('kode_pinjam',$kode_pinjam);
        return $this->db->get('peminjaman')->row_array();
    }
}
?>