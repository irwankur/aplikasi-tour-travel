<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class medsos extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}


	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('medsos')->result();
		$this->load->view('admin/tema/header');	
		$this->load->view('admin/medsos/medsos', $data);
		$this->load->view('admin/tema/footer');	
	}

	public function ubah(){
		if($this->input->post('facebook') == ''){
			$facebook = NULL;
		} else {
			$facebook = $this->input->post('facebook');	
		}
		
		if($this->input->post('pinterest') == ''){
			$pinterest = NULL;
		} else {
			$pinterest = $this->input->post('pinterest');	
		}

		if($this->input->post('twitter') == ''){
			$twitter = NULL;
		} else {
			$twitter = $this->input->post('twitter');	
		}
		
		if($this->input->post('instagram') == ''){
			$instagram = NULL;
		} else {
			$instagram = $this->input->post('instagram');	
		}

		$this->model_perjalanan->ubah_medsos('facebook', $facebook);
		$this->model_perjalanan->ubah_medsos('pinterest', $pinterest);
		$this->model_perjalanan->ubah_medsos('instagram', $instagram);
		$this->model_perjalanan->ubah_medsos('twitter', $twitter);
		redirect('medsos');
	}

	
}
