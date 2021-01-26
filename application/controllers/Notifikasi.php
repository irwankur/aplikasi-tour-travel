<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}

	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('notifikasi')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/notifikasi/notifikasi', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function hapus_notif(){
		$data = $_POST['id_notif'];
		$this->model_perjalanan->delete_multi($data, 'notifikasi', 'id_notif');
	}

	public function hapus_alert(){
		$where = array(
			'status' => 1
		);

		$data = array(
			'status' => 0
		);

		$this->model_perjalanan->ubah('notifikasi', $where, $data);
	}

	public function alert_number(){
		$where = array(
			'status' => 1
		);
		// $data = $this->model_perjalanan->tampil_cari('notifikasi', $where)->result();
		echo json_encode($this->model_perjalanan->tampil_notif());
	}

}
