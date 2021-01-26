<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends CI_Controller {

	
	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('footer')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/footer/footer', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah($id){
		$where = array(
			'id' => $id
		);

		$data['query'] = $this->model_perjalanan->tampil_cari('footer', $where)->row_array();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/footer/ubah', $data);
		$this->load->view('admin/tema/footer');		
	}

	public function ubah_aksi(){
		$where = array(
			'id' => $this->input->post('id')
		);

		$data = array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi')
		);

		
		$this->model_perjalanan->ubah('footer', $where, $data);
		redirect(base_url('footer'));		
	}
} 

