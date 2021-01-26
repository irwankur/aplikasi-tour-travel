<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('pagination');
		$this->load->model('model_perjalanan');
		if($this->session->userdata('pengguna')){
			redirect(base_url('member'));
		}

	}

	public function index()
	{ 
		$favorit = array(
			'favorit' => 1
		);
		$data['favorit'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $favorit)->result();
		
		$where = array(
			'favorit' => 0
		);

		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['slider'] = $this->model_perjalanan->tampil_data('slider')->result();
		$data['query'] = $this->model_perjalanan->tampil_cari_perjalanan('data_perjalanan', $where)->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();

		$this->load->view('home/tema/header');
		$this->load->view('home/index', $data);
		$this->load->view('home/tema/footer', $data);
	}

	
	public function info($id_perjalanan){
		$where = array (
			'id_perjalanan' => $id_perjalanan
		);

		$keterangan = array (
			'status' => 'Tampil'
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/info', $data);
		$this->load->view('home/tema/footer', $data);
		$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Lakukan registrasi untuk pemesanan</div>');
	}

	public function semua_perjalanan(){
		$data['query'] = $this->model_perjalanan->tampil_data('data_perjalanan')->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/semua_perjalanan', $data);
		$this->load->view('home/tema/footer', $data);
	}


	public function tentang_kami(){
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['query'] = $this->model_perjalanan->tampil_data('tentang_kami')->row_array();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/tentang_kami', $data);
		$this->load->view('home/tema/footer', $data);
	}

	public function promo(){
	
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', 'harga_diskon != 0')->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/promo', $data);
		$this->load->view('home/tema/footer');
	}



	// public function cari(){
	// 	$keyword = $this->input->post('keyword');

	// 	$data['query'] = $this->model_perjalanan->cari($keyword);
	// 	$this->load->view('home/tema/header');
	// 	$this->load->view('home/index', $data);
	// 	$this->load->view('home/tema/footer');
	// }

	public function cara_pemesanan(){
		$data['query'] = $this->model_perjalanan->tampil_data('cara_pembayaran')->row_array();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/reservasi', $data);
		$this->load->view('home/tema/footer');
	}

	public function testimoni(){
		$where = array(
			'status' => 'Tampil'
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_testimoni('testimoni', $where)->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/testimoni', $data);
		$this->load->view('home/tema/footer', $data);	
	}

	public function semua_testimoni(){
		$where = array(
			'status' => 'Tampil'
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_cari('testimoni', $where)->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('home/tema/header');
		$this->load->view('home/semua_testimoni', $data);
		$this->load->view('home/tema/footer', $data);	
	}

}
