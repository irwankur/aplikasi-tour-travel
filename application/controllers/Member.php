<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('pagination');
		$this->load->model('model_perjalanan');
		
		cek_session(); 
	}

	public function index(){
		$favorit = array(
			'favorit' => 1
		);
		$data['favorit'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $favorit)->result();
		
		$where = array(
			'favorit' => 0
		);

		$data['slider'] = $this->model_perjalanan->tampil_data('slider')->result();
		$data['query'] = $this->model_perjalanan->tampil_cari_perjalanan('data_perjalanan', $where)->result();
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/index', $data);
		$this->load->view('member/tema/footer', $data);
	}

	// public function cari(){
	// 	$keyword = $this->input->post('keyword');
	// 	$data['query'] = $this->model_perjalanan->cari($keyword);
	// 	$this->load->view('member/tema/header');
	// 	$this->load->view('member/index', $data);
	// 	$this->load->view('member/tema/footer');
	// }

	public function info($id_perjalanan){
		$where = array (
			'id_perjalanan' => $id_perjalanan
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/info', $data);
		$this->load->view('member/tema/footer', $data);
	}

	public function cart($id_perjalanan){
		$where = array (
			'id_perjalanan' => $id_perjalanan
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/cart', $data);
		$this->load->view('member/tema/footer');
	}

	// public function pesan(){

	// 	$harga = htmlspecialchars($this->input->post('paket'));
	// 	$tujuan = htmlspecialchars($this->input->post('tujuan'));
	// 	$paket = htmlspecialchars($this->input->post('nama_paket'));
	// 	$jumlah_penumpang = htmlspecialchars($this->input->post('penumpang'));
	// 	$harga_total = htmlspecialchars($this->input->post('harga_total'));
	// 	$nama = $this->session->userdata('pengguna')->nama;
	// 	$email = $this->session->userdata('pengguna')->email;
	// 	$id_perjalanan = htmlspecialchars($this->input->post('id_perjalanan'));
	// 	$data = array(
	// 		'id_order' => '',
	// 		'id_perjalanan' => $id_perjalanan,
	// 		'nama' => $nama,
	// 		'email' => $email,
	// 		'tujuan' => $tujuan,
	// 		'paket' => $paket,
	// 		'harga' => $harga,
	// 		'jumlah_penumpang' => $jumlah_penumpang,
	// 		'total_harga' => $harga_total
	// 	);
	// 	$this->model_perjalanan->tambah('pesanan', $data);
	// 	redirect('member/proses_order');
	// }


	public function semua_perjalanan(){
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_data('data_perjalanan')->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/semua_perjalanan', $data);
		$this->load->view('member/tema/footer', $data);
	}

	public function proses_order($id, $tanggal){
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$where = ['id_perjalanan' => $id];
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', $where)->row_array();
		$data['tanggal'] = urldecode($tanggal);
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/proses_order', $data);
		$this->load->view('member/tema/footer', $data);
	}

	public function aksi_order(){
		$id = htmlspecialchars($this->input->post('id_perjalanan'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$no_hp = htmlspecialchars($this->input->post('no_hp'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$email = $this->session->userdata('pengguna')['email'];
		$paket = htmlspecialchars($this->input->post('paket'));
		$tujuan = htmlspecialchars($this->input->post('tujuan'));
		$jml_penumpang = htmlspecialchars($this->input->post('jml_penumpang'));
		$jml_harga = htmlspecialchars($this->input->post('jml_harga'));
		$harga = htmlspecialchars($this->input->post('harga'));

		$data = array(
			'id_order' => '',
			'id_perjalanan' => $id,
			'nama' => $nama,
			'no_handphone' => $no_hp,
			'email' => $email,
			'tujuan' => $tujuan,
			'paket' => $paket,
			'harga' => $harga,
			'jumlah_penumpang' => $jml_penumpang,
			'total_harga' => $jml_harga
		);

		$this->_sendEmail('order');

		$data_notif = array( 
			'id_notif' => '',
			'nama' => 'order',
			'isi' => 'Pesanan baru dari '.$nama,
			'status' => 1
		);

		$this->model_perjalanan->tambah('notifikasi', $data_notif);
		$this->model_perjalanan->tambah('pesanan', $data);
		$this->session->set_flashdata('status', 'order');
		redirect('member');	
	}

	public function mail(){
		$this->_sendEmail('pertanyaan');
		$this->session->set_flashdata('status', 'pertanyaan_terkirim');
		redirect('member');
	}

	private function _sendEmail($isi){
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


		if($isi == 'pertanyaan'){
			$this->load->library('email', $config);
			$this->email->initialize($config);		

			$this->email->from($this->session->userdata('pengguna')['email'], $this->session->userdata('pengguna')['nama']);
			$this->email->to('admin@kerabatjalan.com');

			//jika tipe email verifikasi
			$this->email->subject('pertanyaan');
			$this->email->message(htmlspecialchars($this->input->post('pesan')));

		} else {
			$this->load->library('email', $config);
			$this->email->initialize($config);		

			$this->email->from($this->session->userdata('pengguna')['email'], $this->session->userdata('pengguna')['nama']);
			$this->email->to('admin@kerabatjalan.com');

			//jika tipe email verifikasi
			$this->email->subject('Pesanan Baru');
			$this->email->message('<table border="1" cellspacing="0" align="center">
						<tr>
							<th>Nama</th>
							<th>No. Telepon</th>
							<th>Tujuan</th>
							<th>Jumlah Tiket</th>
						</tr>
						<tr>
							<td>'.$this->input->post('nama').'</td>
							<td>'.$this->input->post('no_hp').'</td>
							<td>'.$this->input->post('tujuan').'</td>
							<td style="text-align: center">'.$this->input->post('jml_penumpang').'</td>
						</tr>
					</table>'); 
		}
		
		
	
		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger(); die;
		}
	}

	public function tentang_kami(){
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_data('tentang_kami')->row_array();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/tentang_kami', $data);
		$this->load->view('member/tema/footer');
	}

	public function promo(){
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_cari('data_perjalanan', 'harga_diskon != 0')->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/promo', $data);
		$this->load->view('member/tema/footer', $data);
	}

	public function cara_pemesanan(){
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$data['query'] = $this->model_perjalanan->tampil_data('cara_pembayaran')->row_array();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/reservasi', $data);
		$this->load->view('member/tema/footer');
	}

	public function testimoni(){
		$where = array(
			'status' => 'Tampil'
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$email = $this->session->userdata('pengguna')['email'];
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$data['status_order'] = $this->model_perjalanan->tampil_cari('member', ['email' => $email])->row_array();
		$data['query'] = $this->model_perjalanan->tampil_testimoni('testimoni', $where)->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/testimoni', $data);
		$this->load->view('member/tema/footer', $data);	
	}

	public function semua_testimoni(){
		$where = array(
			'status' => 'Tampil'
		);
		$data['medsos'] = $this->model_perjalanan->tampil_medsos()->result(); 
		$email = $this->session->userdata('pengguna')['email'];
		$data['rek'] = $this->model_perjalanan->tampil_cari('rekening', ['status' => 'Tampil'])->result();
		$data['status_order'] = $this->model_perjalanan->tampil_cari('member', ['email' => $email])->row_array();
		$data['query'] = $this->model_perjalanan->tampil_cari('testimoni', $where)->result();
		$data['footer'] = $this->model_perjalanan->tampil_data('footer')->result();
		$this->load->view('member/tema/header');
		$this->load->view('member/semua_testimoni', $data);
		$this->load->view('member/tema/footer', $data);	
	}

	public function input_testimoni(){
		
		$komentar = htmlspecialchars($this->input->post('komentar'));
		$id_member = $this->session->userdata('pengguna')['id_member'];
		$nama = $this->session->userdata('pengguna')['nama'];
		$email = $this->session->userdata('pengguna')['email'];
		
		//tambah data notifikasi
		$data = array(
			'id_member' => $id_member,
			'nama' => $nama,
			'tanggal' => time(),
			'komentar' => $komentar
		);

		//menambah notifikasi
		$data_notif = array(
			'id_notif' => '',
			'nama' => 'testimoni',
			'isi' => 'testimoni baru dari '.$nama,
			'status' => 1
		);

		//mengubah status order pada member member menjadi 0
		$where = array(
			'email' => $email
		);
		$status = array (
			'status_order' => 0
		);
		$this->model_perjalanan->ubah('member', $where, $status);

		$this->model_perjalanan->tambah('notifikasi', $data_notif);
		$this->model_perjalanan->tambah('testimoni', $data);
		$this->session->set_flashdata('status', 'terkirim');
		redirect('member/testimoni');
	}
}
