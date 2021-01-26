<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('testimoni')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/testimoni/testimoni', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah(){
		$where = array(
			'id' => $this->input->post('id')
		);

		$data = array(
			'tentang_kami' => $this->input->post('tentang')
		);
		$this->model_perjalanan->ubah('tentang_kami', $where, $data);
		redirect(base_url('tentang'));
	}


	public function update_status(){
		$status = $this->input->post('status');
		$id = $this->input->post('id_testimoni');
		$this->model_perjalanan->status_tampil($status, $id);
	}

	public function hapus(){
		$data = $_POST['id_testimoni'];
		$this->model_perjalanan->delete_multi($data, 'testimoni', 'id_testimoni');
	}
}
