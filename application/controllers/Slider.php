<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('slider')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/slider/slider', $data);
		$this->load->view('admin/tema/footer');	
	}

	private function _hapusGambar($data){
		unlink("gambar/".$data);
	}
	
	public function ubah(){

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
				$this->_hapusGambar($this->input->post('gambarLama'));
			} else { // jika upload gagal
				$data['kesalahan'] = $dataGambar['error'];				
				redirect(base_url('data_perjalanan/ubah', $data));
			}

		} else {
			$namaGambar = $this->input->post('gambarLama');
		}


		$data = array (	
				'gambar' => $namaGambar,
				'judul' => $this->input->post('judul'),
				'text' => $this->input->post('text')
				); 

		$where = array(
			'id' => $this->input->post('id')
		);

		$this->model_perjalanan->ubah('slider', $where, $data);
		redirect(base_url('slider'));	
	}
}
