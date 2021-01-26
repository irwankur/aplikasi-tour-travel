<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->library('pdf');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}

	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('data_perjalanan')->result();
		$this->load->view('admin/tema/header');
        $this->load->view('admin/Kelompok/Kelompok', $data);
        $this->load->view('admin/tema/footer'); 
	}

	public function detail_kelompok($id){
		$where = array (
			'id_perjalanan' => $id
		);

		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
		$data['tujuan'] = $id;
		$this->load->view('admin/tema/header');
        $this->load->view('admin/Kelompok/detail_Kelompok', $data);
        $this->load->view('admin/tema/footer');

	}

	public function detail_penumpang($id_perjalanan, $tujuan, $tanggal){
		
		$where = array (
			'id_perjalanan' => $id_perjalanan,
			'paket' => urldecode($tanggal),
			'status' => 'Bayar'
		);

		$data['data'] = array (
			'id_perjalanan' => $id_perjalanan,
			'paket' => urldecode($tanggal),
			'tujuan' => urldecode(ucwords($tujuan))
		);

		$data['query'] = $this->model_perjalanan->tampil_cari('pesanan', $where)->result();	

		// if($query->num_rows() > 0){
		// 	$data['query'] = $this->model_perjalanan->tampil_cari('pesanan', $where)->result();	
		// } else { 
			
		// 	$where = array (
		// 		'id_perjalanan' => $id_perjalanan,
		// 	);

		// 	$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->result();	
		// }

		$this->load->view('admin/tema/header');
        $this->load->view('admin/kelompok/detail_penumpang', $data);
        $this->load->view('admin/tema/footer');
	}

	public function cetak($id_perjalanan, $tujuan, $tanggal){
		$where = array (
			'id_perjalanan' => $id_perjalanan,
			'paket' => urldecode($tanggal),
			'status' => 'Bayar'
		);

		$data['data'] = array (
			'id_perjalanan' => $id_perjalanan,
			'paket' => urldecode($tanggal),
			'tujuan' => urldecode($tujuan)	
		);

		$data['query'] = $this->model_perjalanan->tampil_cari('pesanan', $where)->result();
		$this->load->view('admin/kelompok/cetak', $data);
		
	}

}
