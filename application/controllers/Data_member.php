<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_member extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}

	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('member')->result();
		$this->load->view('admin/tema/header');
		$this->load->view('admin/member/member', $data);
		$this->load->view('admin/tema/footer');
	}

	public function hapus(){
		$data = $_POST['id_member'];
		$this->model_perjalanan->delete_multi($data, 'member', 'id_member');
	}

}
