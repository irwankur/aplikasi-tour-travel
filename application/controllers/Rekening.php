<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}

	// rekening 
	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('rekening')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/rekening/index', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah_rekening($id_rekening){
		$where = array(
			'id_rekening' => $id_rekening
		);
		$data['query'] = $this->model_perjalanan->tampil_cari('rekening', $where)->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/rekening/ubah', $data);
		$this->load->view('admin/tema/footer');
	}

	private function _hapusGambar($data){
		unlink("gambar/".$data);
	}

	public function ubah_aksi(){
		if($_FILES['gambar']['name'] != ""){
			$config['upload_path'] = 'gambar';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = uniqid();
			$config['max_size'] = 3000; 
			$config['remove_space'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			//proses upload		
			$dataGambar = $this->model_perjalanan->upload();

			//jika upload sukses
			if($dataGambar['result'] == 'success'){
				$namaGambar = $dataGambar['file']['file_name'];
				$this->_hapusGambar($this->input->post('GambarLama'));
			} else { // jika upload gagal
				$data['kesalahan'] = $dataGambar['error'];				
				redirect(base_url('data_perjalanan/ubah', $data));
			}

		} else {
			$namaGambar = $this->input->post('GambarLama');
		}

		$data = array (	
					'nama_rekening' => $this->input->post('nama'),
					'nama_pemilik' => $this->input->post('nama_pemilik'),
					'nomor' => $this->input->post('nomor'),
					'gambar' => $namaGambar
				); 

		$where = array(
			'id_rekening' => $this->input->post('id_rekening')
		);

		$this->model_perjalanan->ubah('rekening', $where, $data);
		redirect(base_url('rekening'));	
	}


	public function update_status(){
		$status = $this->input->post('status');
		$id = $this->input->post('id_rekening');
		$this->model_perjalanan->update_status_tampil($status, $id);
	}
}
