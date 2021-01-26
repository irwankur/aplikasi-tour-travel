<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

	
	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('promo')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/promo/promo', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah(){
		$where = array(
			'id' => $this->input->post('id')
		);

		$data = array(
			'promo' => $this->input->post('promo')
		);
		$this->model_perjalanan->ubah('promo', $where, $data);
		redirect(base_url('promo'));
	}
} 

