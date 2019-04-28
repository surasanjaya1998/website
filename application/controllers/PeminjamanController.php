<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class PeminjamanController extends CI_Controller { 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman');
		$this->load->model('Anggota');
		$this->load->model('Petugas');
	}
	public function index() { 
		$data['dataPeminjaman'] = $this->Peminjaman->getListPeminjaman();
		$this->template->load('template','peminjaman/index',$data);
	}
	public function create(){
		$data['dataAnggota'] = $this->Anggota->getListAnggota();
		$data['dataPetugas'] = $this->Petugas->getListPetugas();
		$this->template->load('template','peminjaman/create', $data);
	}
	public function store(){
		$data = array(
			'kode_anggota' => $this->input->post('kode_anggota'),
			'kode_petugas' => $this->input->post('kode_petugas'),
		);
		$result = $this->Peminjaman->insert($data);
		echo json_encode($result);
	}
	public function delete(){
		$result = $this->Peminjaman->delete($this->input->post('kode_pinjam'));
		echo json_encode($result);
	}	  
	public function edit($kode_pinjam){
		$data['dataAnggota'] = $this->Anggota->getListAnggota();
		$data['dataPetugas'] = $this->Petugas->getListPetugas();
		$data['dataPeminjaman'] = $this->Peminjaman->getDataPeminjaman($kode_pinjam);
		$this->template->load('template','peminjaman/edit',$data);
	}
	public function update($kode_pinjam){
		$result = $this->Peminjaman->update($kode_pinjam);
		echo json_encode($result);
	}
}