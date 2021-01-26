<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perjalanan extends CI_Controller {

	function __construct(){
		parent::__construct();	 
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		$this->load->library('form_validation');
		cek_session_admin();
	}

	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('data_perjalanan')->result();
		$this->load->view('admin/tema/header', $data);
		$this->load->view('admin/data_perjalanan/data_perjalanan', $data);
		$this->load->view('admin/tema/footer');
	}

	public function initial(){
		$this->load->view('admin/tema/header');
		$this->load->view('admin/data_perjalanan/initial');
		$this->load->view('admin/tema/footer');
	}

	public function tambah(){
		$this->load->view('admin/tema/header');
		$this->load->view('admin/data_perjalanan/tambah');
		$this->load->view('admin/tema/footer');
	}

	public function tambah_aksi(){

		$config['upload_path'] = 'gambar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = uniqid();
		$config['max_size'] = 3000;
		$config['remove_space'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		//proses upload		
		$dataGambar = $this->model_perjalanan->upload();
	
		$post_keberangkatan = $this->input->post('tanggal_keberangkatan');
		$post_lama = $this->input->post('lama');		

		// cek apakah tanggal array
		if(is_array($post_keberangkatan)){
			// cek apakah ada array kosong
			for($i=0; $i<3; $i++){
				if($post_keberangkatan[$i] == ""){
					unset($post_keberangkatan[$i]);
					unset($post_lama[$i]);
				}
			}
			$arr_keberangkatan = array_values($post_keberangkatan);
			$arr_lama = array_values($post_lama);
			$tanggal_keberangkatan = serialize($arr_keberangkatan);
			$lama = serialize($arr_lama);	 
		} else {
			$lama = '';
			$tanggal_keberangkatan = $post_keberangkatan;
		}
		//jika  upload sukses
		if($dataGambar['result'] == 'success'){
			 
			if(!empty($this->input->post('harga_diskon'))){
				$harga_diskon = htmlspecialchars($this->input->post('harga_diskon'));
			} else {
				$harga_diskon = 0;
			}

			$data = array (	
				'tujuan' => htmlspecialchars(ucwords($this->input->post('tujuan'))),
				'tanggal_keberangkatan' => $tanggal_keberangkatan,
				'harga' => htmlspecialchars($this->input->post('harga')),
				'harga_diskon' => $harga_diskon, 
				'lama' => $lama,
				'mepo' => htmlspecialchars($this->input->post('mepo')),
				'keterangan' => htmlspecialchars($this->input->post('keterangan')),
				'cover' => $dataGambar['file']['file_name']
			); 

			$this->model_perjalanan->tambah('data_perjalanan', $data);
			redirect('data_perjalanan');
		// jika upload gagal
		} else {
			$data['message'] = $dataGambar['error'];
			redirect(base_url('data_perjalanan/tambah'));
		}
	} 
	
	public function hapus($id){
		$where = array(
			'id_perjalanan' => $id
		);

		$data = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
		$this->_hapusGambar($data['cover']);

		$this->model_perjalanan->hapus('data_perjalanan', $where);
		redirect('data_perjalanan');
	}

	public function ubah($id){
		$where = array (
			'id_perjalanan' => $id
		);

		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
 		
		$this->load->view('admin/tema/header');
		$this->load->view('admin/data_perjalanan/ubah', $data);
		$this->load->view('admin/tema/footer');
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
				$this->_hapusGambar($this->input->post('gambarLama'));
			} else { // jika upload gagal
				$data['kesalahan'] = $dataGambar['error'];				
				redirect(base_url('data_perjalanan/ubah', $data));
			}

		} else {
			$namaGambar = $this->input->post('gambarLama');
		}



		$post_keberangkatan = $this->input->post('tanggal_keberangkatan');	
		$post_lama = $this->input->post('lama');

		// cek jika tanggal keberangkatan array
		if(is_array($post_keberangkatan)){

			for($i=0; $i<3; $i++){
				if($post_keberangkatan[$i] == ""){
					unset($post_keberangkatan[$i]);
					unset($post_lama[$i]);
				}
			}
			$arr_keberangkatan = array_values($post_keberangkatan);
			$arr_lama = array_values($post_lama);
			
			$tanggal_keberangkatan = serialize($arr_keberangkatan);
			$lama = serialize($arr_lama);	 

		} else {
			$lama = '';
			$tanggal_keberangkatan = 'Setiap Hari';
		}

		if(!empty($this->input->post('harga_diskon'))){
			$harga_diskon = htmlspecialchars($this->input->post('harga_diskon'));
		} else {
			$harga_diskon = 0;
		}

		$data = array (	
				'tujuan' => htmlspecialchars($this->input->post('tujuan')),
				'tanggal_keberangkatan' => $tanggal_keberangkatan,
				'harga' => htmlspecialchars($this->input->post('harga')),
				'harga_diskon' => $harga_diskon,
				'lama' => $lama,
				'mepo' => $this->input->post('mepo'),
				'keterangan' => $this->input->post('keterangan'),
				'cover' => $namaGambar
				); 

		$where = array(
			'id_perjalanan' => $this->input->post('id_perjalanan')
		);

		$this->model_perjalanan->ubah('data_perjalanan', $where, $data);
		redirect(base_url('data_perjalanan'));	
	}

	private function _hapusGambar($data){
		unlink("gambar/".$data);
	}

	public function update_favorit(){
		$this->model_perjalanan->update_favorit($this->input->post('id_perjalanan'), $this->input->post('status'));
		echo $this->input->post('status');
	}

}
