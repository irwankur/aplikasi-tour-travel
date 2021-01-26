<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_admin extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		$this->load->library('form_validation');
	}

	public function index(){
		cek_login_admin();	
		$this->load->view('auth/login_admin');
	}

	public function aksi_login(){

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		
		if($this->form_validation->run() == false){
			redirect(base_url('login_admin'));		
		} else {
			$username = $this->input->post('username');
			$pass 	  = $this->input->post('password');

			$src = $this->db->get_where('admin', array (
				'username' 	=> $username
			));
			
			if ($src->num_rows() == 0) {
				$this->session->set_flashdata('status', 'failed');
				redirect(base_url('login_admin'));
			}
			else {
				$pengguna = $src->row_array();
				if(!password_verify($pass, $pengguna['password'])){
					$this->session->set_flashdata('status', 'failed');		
					redirect(base_url('login_admin'));
				} else {
					$this->session->set_userdata('admin', $pengguna);
					redirect(base_url('data_perjalanan'));	
				}
				
			}

		}

	}

	public function ubah_password(){

		$data['user'] = $this->model_perjalanan->tampil_data('admin')->row_array();

		$this->form_validation->set_rules('password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[6]|matches[konfirmasi_password]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[password_baru]');
		if($this->form_validation->run() == false){
			$this->load->view('admin/tema/header');	
			$this->load->view('admin/ubah_password/ubah_password');
			$this->load->view('admin/tema/footer');	
		} else {
			$password = $this->input->post('password');
			$password_baru = $this->input->post('password_baru');
			if(!password_verify($password, $data['user']['password'])){
				$this->session->set_flashdata('status', 'pass_salah');
				redirect('login_admin/ubah_password');
			} else {
				if($password == $password_baru){
					$this->session->set_flashdata('status', 'pass_sama');
					redirect('login_admin/ubah_password');
				} else {
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$where = array( 'id_admin' => $data['user']['id_admin']);
					$data = array('password' => $password_hash);
					$this->model_perjalanan->ubah('admin', $where, $data);
					redirect('data_perjalanan');
				}
			}
		}
	}

	public function keluar(){
		$this->session->unset_userdata('admin');
		redirect(base_url('login_admin'));
	}
	
}



