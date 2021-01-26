<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cara_pembayaran extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('cara_pembayaran')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/cara_pembayaran/cara_pembayaran', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah(){
		$where = array(
			'id' => $this->input->post('id')
		);

		$data = array(
			'cara_pembayaran' => $this->input->post('cara_pembayaran')
		);
		$this->model_perjalanan->ubah('cara_pembayaran', $where, $data);
		redirect(base_url('cara_pembayaran'));
	}
}
