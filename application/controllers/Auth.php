 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('authen');
		$this->load->library('form_validation');  
		$this->load->model('model_perjalanan');
	}

	public function login_member(){
		$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|trim|valid_email',
	                'errors' => array(
	                    'required' 		=> 'Harus diisi',
	                    'valid_email' 	=> 'Format harus sesuai email'
	                )
	        ), 
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => 'Harus diisi'
	                )
	        )
		);

		$this->form_validation->set_rules($config);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 

		if($this->form_validation->run() == false){
			$data['rekening'] = $this->model_perjalanan->tampil_data('rekening')->result();
			$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
			$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
			$this->load->view('home/tema/header');
			$this->load->view('auth/login');
			$this->load->view('home/tema/footer', $data);		
		} else {
			$email 	= $this->input->post('email');
			$pass 	  = $this->input->post('password');

			
			$src = $this->db->get_where('member', array (
				'email' => $email
			));

			//cek user 		
			if (!$src) {
				$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email / Password salah !</div>');
				redirect(base_url('auth/login_member'));
			}
			else {
				$pengguna = $src->row_array();
				if(!password_verify($pass, $pengguna['password'])){
					$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email / Password salah !</div>');
					redirect(base_url('auth/login_member'));
				} else {
					$status = $src->row_array();	
					if($status['status'] > 0){
						$this->session->set_userdata('pengguna', $pengguna);
						redirect(base_url('member'));
					}else {
						$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email belum aktif</div>');
						redirect(base_url('auth/login_member'));
					}
				}
				
			}
		}
		
	}

	public function daftar(){
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$config = array(
	        array(
	                'field' => 'nama',
	                'label' => 'Nama',
	                'rules' => 'required|trim',
	                'errors' => array(
	                    'required' => 'Harus di isi',
	                )
	        ),
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|trim|valid_email|is_unique[member.email]',
	                'errors' => array(
	                    'required' 		=> 'Harus diisi',
	                    'valid_email' 	=> 'Format harus sesuai email',
	                    'is_unique'		=> '%s sudah terdaftar'
	                )
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required|min_length[6]|matches[konfirmasi_password]',
	                'errors' => array(
	                        'required' => 'Harus diisi',
	                        'min_length' => 'Minimal 6 karakter',
	                        'matches' => 'Konfirmasi password tidak sesuai'
	                )
	        ),
	        array(
	                'field' => 'konfirmasi_password',
	                'label' => 'Konfirmasi Password',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => 'Harus diisi',
	                )
	        )
		);

		$this->form_validation->set_rules($config);

		$kode = $this->input->post('kode');
		$mycaptcha = $this->session->userdata('mycaptcha');
		//jika rule salah
		if($this->form_validation->run() == false) {
			
			// jika rule salah dan kode captcha benar
			if($kode == $mycaptcha) {
				$config = array(
					'img_path' => './captcha/',
					'img_url' => base_url().'captcha/',
					'img_width' => 200,
					'img_height'=> 60,
					'font_path' => './assets/font/Antonio-Regular.ttf',
					'word_length' => 5,
					'font_size' => 20,
					'border' => 0,
					'expiration' => 7200,
					'pool' => '12345asdf'
				);

				$cap = create_captcha($config);

				$data['img'] = $cap['image'];

				$this->session->set_userdata('mycaptcha', $cap['word']);
				$this->load->view('home/tema/header');
				$this->load->view('auth/daftar', $data);
				$this->load->view('home/tema/footer', $data);

			//jika rule salah dan captcha salah
			} else {
				$config = array(
					'img_path' => './captcha/',
					'img_url' => base_url().'captcha/',
					'img_width' => 200,
					'img_height'=> 60,
					'font_path' => './assets/font/Antonio-Regular.ttf',
					'word_length' => 5,
					'font_size' => 20,
					'border' => 0,
					'expiration' => 7200,
					'pool' => '12345asdf'
				);

				$cap = create_captcha($config);

				$data['img'] = $cap['image'];

				if(empty($kode)){
					$this->session->set_flashdata('notif', 'benar');
				} else {
					$this->session->set_flashdata('notif', 'salah');
				}

				$this->session->set_userdata('mycaptcha', $cap['word']);
				$this->load->view('home/tema/header');
				$this->load->view('auth/daftar', $data);
				$this->load->view('home/tema/footer', $data);
				
			}
		
		// jika rule benar
		} else {
			$email = $this->input->post('email');
			// jika rule benar dan captcha benar
			if($kode == $mycaptcha) {
				$data = array(
					'id_member' => '',
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'nama' => htmlspecialchars($this->input->post('nama')),
					'email' => htmlspecialchars($email),
					'status' => 0,
					'tanggal_dibuat' => time(),
					'status_order' => 0
				);

				$token = base64_encode(random_bytes(32));

				$user_token = array (
					'email' 			=> $email,
					'token' 			=> $token,
					'tanggal_dibuat' 	=> time()
				);

				$this->model_perjalanan->tambah('member', $data);
				$this->model_perjalanan->tambah('token_member', $user_token);

				$this->_sendEmail($token, 'verifikasi');
				$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">Silahkan lakukan verifikasi, melalui email yang kami kirim</div>');
				redirect('auth/login_member');	
			//jika rule benar dan captcha salah
			} else {
				$config = array(
					'img_path' => './captcha/',
					'img_url' => base_url().'captcha/',
					'img_width' => 200,
					'img_height'=> 60,
					'font_path' => './assets/font/Antonio-Regular.ttf',
					'word_length' => 5,
					'font_size' => 20,
					'border' => 0,
					'expiration' => 7200,
					'pool' => '12345asdf'
				);

				$cap = create_captcha($config);

				$data['img'] = $cap['image'];
				$this->session->set_flashdata('notif', 'salah');
				$this->session->set_userdata('mycaptcha', $cap['word']);

				$this->load->view('home/tema/header');
				$this->load->view('auth/daftar', $data);
				$this->load->view('home/tema/footer', $data);
			}
			
		}

	}

	private function _sendEmail($token, $tipe){
		 $config = Array(
          'protocol' 	=> 'smtp',
          'smtp_host' 	=> 'ssl://mail.kerabatjalan.com',
          'smtp_port' 	=> 465,
          'smtp_user' 	=> 'admin@kerabatjalan.com', 
          'smtp_pass' 	=> 'adminkerabatjalan', 
          'mailtype' 	=> 'html',
          'charset' 	=> 'utf-8',
          'set_newline' => "\r\n"
        );


		$this->load->library('email', $config);
		$this->email->initialize($config);		

		$this->email->from('admin@kerabatjalan.com', 'Kerabat Jalan');
		$this->email->to($this->input->post('email'));


		//jika tipe email verifikasi
		if ($tipe == 'verifikasi') {
			$this->email->subject('verifikasi Akun');
			$this->email->message('Klik tautan berikut untuk verifikasi akun anda : 
				<a href="'. base_url() . 'auth/verifikasi?email='.$this->input->post('email') . '&token='. urlencode($token) . '">Aktivasi</a> '); 
		} else if($tipe == 'lupa_password') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik tautan berikut untuk reset password anda : 
				<a href="'. base_url() . 'auth/reset_password?email='.$this->input->post('email') . '&token='. urlencode($token) . '">Reset Password</a> '); 
		}
	
		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger(); die;
		}
	}

	public function reset_password(){



		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->model_perjalanan->tampil_cari('member', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->model_perjalanan->tampil_cari('token_member', ['token' => $token])->row_array();
			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->ubahPassword();
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Token salah !</div>');
				redirect('auth/login');	
			}
		} else {
			$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email salah !</div>');
			redirect('auth/login');
		}

	}

	public function ubahPassword(){

		if(!$this->session->userdata('reset_email')){
			redirect('auth/login');
		}


		$config = array(
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required|trim|min_length[6]|matches[konfirmasi_password]',
	                'errors' => array(
	                        'required' => 'Harus diisi',
	                        'min_length' => 'Minimal 6 karakter',
	                        'matches' => 'Konfirmasi password tidak sesuai'
	                )
	        ),
	        array(
	                'field' => 'konfirmasi_password',
	                'label' => 'Konfirmasi Password',
	                'rules' => 'required|trim|min_length[6]|matches[password]',
	                'errors' => array(
	                    'required' 		=> 'Harus diisi',
	                    'min_length'    => 'Minimal 6 karakter',
	                	'matches'		=> 'Konfirmasi Password tidak sama'
	                )
	        )
		);



		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){
			$data['rekening'] = $this->model_perjalanan->tampil_data('rekening')->result();
			$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
			$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
			$this->load->view('home/tema/header');
			$this->load->view('auth/ubah_password');
			$this->load->view('home/tema/footer', $data);				
		} else {
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$where = ['email' => $email];

			$this->model_perjalanan->ubah_password('member', $password, $where);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">Password berhasil diubah, silahkan login</div>');
			redirect(base_url('auth/login_member'));
		}
		
	}

	public function lupa_password(){


		$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|trim|valid_email',
	                'errors' => array(
	                    'required' 		=> 'Harus diisi',
	                    'valid_email' 	=> 'Format harus sesuai email'
	                )
	        )
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false) {
			$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result();
			$data['rekening'] = $this->model_perjalanan->tampil_data('rekening')->result();
			$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
			$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
			$this->load->view('home/tema/header');
			$this->load->view('auth/lupa_password');
			$this->load->view('home/tema/footer', $data);	
		} else {
			$email = $this->input->post('email'); 
			$member = $this->model_perjalanan->tampil_cari('member', ['email' => $email, 'status' => 1])->row_array();
			if($member){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'tanggal_dibuat' => time()
				];

				$this->model_perjalanan->tambah('token_member', $user_token);
				$this->_sendEmail($token, 'lupa_password');
				$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">link verifikasi terkirim, silahkan cek email anda</div>');
				redirect('auth/lupa_password');
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum terverifikasi</div>');
				redirect(base_url('auth/lupa_password'));
			}
		}
			
	}

	public function verifikasi(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$where = array (
			'email' => $email
		);

		$member = $this->model_perjalanan->tampil_cari('member', $where)->row_array();

		if($member){
			$user_token = $this->model_perjalanan->tampil_cari('token_member', ['token' => $token])->row_array();
			if($user_token){
				if(time() - $user_token['tanggal_dibuat'] < (60 * 60 *24)){
					$this->model_perjalanan->ubah('member', ['email' => $email], ['status' => 1]);
					$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">Email sudah terverifikasi, silahkan login</div>');
					redirect(base_url('auth/login_member'));
				} else {
					$this->model_perjalanan->delete('member', ['email' => $email]);
					$this->model_perjalanan->delete('token_user', ['email' => $email]);	
				}
				
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Token salah !</div>');
				redirect('auth/login_member'); 
			}
		} else {
			$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Email salah !</div>');
			redirect('auth/login_member'); 
		}
	}

	public function keluar_member(){
		$this->session->unset_userdata('pengguna');
		redirect(base_url('home'));
	}
	
	public function ubah_data(){

		$where = array(
			'id_member' => $this->session->userdata('pengguna')['id_member']
		);

		$config = array(
	        array(
	                'field' => 'nama',
	                'label' => 'Nama',
	                'rules' => 'required|trim',
	                'errors' => array(
	                'required' => 'Harus di isi',
	                )
	        )
		);
		
		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){
			$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
			$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
			$this->load->view('member/tema/header');
			$this->load->view('member/ubah_password');
			$this->load->view('member/tema/footer', $data);
		} else {
			$data = array (
				'nama' => $this->input->post('nama')
			);

			$data['query'] = $this->model_perjalanan->ubah('member', $where, $data);

			//hapus session 
			$this->session->unset_userdata('pengguna');

			//buat session baru
			$query = $this->model_perjalanan->tampil_cari('member', $where)->row_array();

			$this->session->set_userdata('pengguna', $query);
			redirect(base_url('member'));
		}
	}

	public function ubah_password(){
		$where = array (
			'email' => $this->session->userdata('pengguna')['email']
		);

		$data['user'] = $this->model_perjalanan->tampil_cari('member', $where)->row_array();

		$config = array(
	        array(
	                'field' => 'password_lama',
	                'label' => 'Password Lama',
	                'rules' => 'required|trim',
	                'errors' => array(
	                    'required' 		=> 'Harus diisi',
	                )
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required|min_length[6]|matches[konfirmasi_password]',
	                'errors' => array(
	                        'required' => 'Harus diisi',
	                        'min_length' => 'Minimal 6 karakter',
	                        'matches' => 'Konfirmasi password tidak sesuai'
	                )
	        ),
	        array(
	                'field' => 'konfirmasi_password',
	                'label' => 'Konfirmasi Password',
	                'rules' => 'required|min_length[6]|matches[password]',
	                'errors' => array(
                		'required' => 'Harus diisi',
                        'min_length' => 'Minimal 6 karakter',
                        'matches' => 'Konfirmasi password tidak sesuai'
	                )
	        )
		);

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false){
			$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result();
			$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
			$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
			$this->load->view('member/tema/header');
			$this->load->view('member/ubah_password');
			$this->load->view('member/tema/footer', $data);
		} else {	
 			$password_baru = $this->input->post('password');
			$password_lama = $this->input->post('password_lama');

			//apakah password lama sama
			if(!password_verify($password_lama, $data['user']['password'])){
				$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah!</div>');
				redirect(base_url('auth/ubah_password'));
			} else {
				// jika password lama dan baru sama
				if($password_lama == $password_baru){
					$this->session->set_flashdata('status', '<div class="alert alert-danger" role="alert">Password lama dan baru tidak boleh sama!</div>');
					redirect(base_url('auth/ubah_password'));
				// jika berbeda
				} else {
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->model_perjalanan->ubah_password('member', $password_hash, $where);
					$this->session->set_flashdata('status', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
					redirect(base_url('auth/ubah_password'));

				}
			}
		}
	}

}
