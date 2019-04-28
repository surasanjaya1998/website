<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class DetailPeminjamanController extends CI_Controller { 
	function __construct()
	{
		parent::__construct();
		$this->load->model('DetailPeminjaman');
		$this->load->model('Buku');
	}
	public function index($kode_pinjam) { 
		$data['dataDetailPeminjaman'] = $this->DetailPeminjaman->getListDetailPeminjaman($kode_pinjam);
		$data['kode_pinjam'] = $kode_pinjam;
		$this->template->load('template','detail_peminjaman/index',$data);
	}
	public function create($kode_pinjam){
		$data['dataBuku'] = $this->Buku->getListBuku();
		$data['kode_pinjam'] = $kode_pinjam;
		$this->template->load('template','detail_peminjaman/create', $data);
	}
	public function store($kode_pinjam){
		$data = array(
			'kode_register' => $this->input->post('kode_register'),
			'kode_pinjam' => $kode_pinjam,
			'tgl_pinjam' => $this->input->post('tgl_pinjam'),
			'tgl_kembali' => $this->input->post('tgl_kembali')
		);
		$result = $this->DetailPeminjaman->insert($data);
		echo json_encode($result);
	}
}