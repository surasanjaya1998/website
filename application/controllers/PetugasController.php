<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class PetugasController extends CI_Controller { 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Petugas');
	}
	public function index() { 
		$data['dataPetugas'] = $this->Petugas->getListPetugas();
		$this->template->load('template','petugas/index',$data);
	}
	public function create(){
		$this->template->load('template','petugas/create');
	}
	public function store(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat')
		);
		$result = $this->Petugas->insert($data);
		echo json_encode($result);
	}
	public function delete(){
		$result = $this->Petugas->delete($this->input->post('kode_petugas'));
		echo json_encode($result);
	}	  
	public function edit($kode_petugas){
		$data['dataPetugas'] = $this->Petugas->getDataPetugas($kode_petugas);
		$this->template->load('template','petugas/edit',$data);
	}
	public function update($kode_petugas){
		$result = $this->Petugas->update($kode_petugas);
		echo json_encode($result);
	}
}