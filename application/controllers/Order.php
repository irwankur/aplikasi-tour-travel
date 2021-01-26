<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('cart');
		$this->load->model('model_perjalanan');
		cek_session_admin();
	}

	public function index(){
		$data['query'] = $this->model_perjalanan->tampil_data('pesanan')->result();
		$this->load->view('admin/tema/header');
		$this->load->view('admin/order/order', $data);
		$this->load->view('admin/tema/footer');
	}

	public function hapus(){
		$data = $_POST['id_order'];
		$this->model_perjalanan->delete_multi($data, 'pesanan', 'id_order');
	}

	public function update_status(){
		$status = $this->input->post('status');
		$id = $this->input->post('id_order');
		$email = $this->input->post('email');
		$where = array(
			'email' => $email
		);
		$data = array (
			'status_order' => 1
		);
		$this->model_perjalanan->ubah('member', $where, $data);

		$this->model_perjalanan->update_status($status, $id);
	}

	public function tambah_data(){
		$data['query'] = $this->model_perjalanan->tampil_data_perjalanan();
		$this->load->view('admin/tema/header');
		$this->load->view('admin/order/tambah', $data);
		$this->load->view('admin/tema/footer');
	}

	public function cari_tanggal(){
		$id = $this->input->post('id_perjalanan');
		$data = $this->model_perjalanan->tampil_tanggal($id);
		

		$hasil = @unserialize($data[0]->tanggal_keberangkatan);
		
		// $hasil = json_encode($hasil);
		if($hasil !== false){
			$tanggal = json_encode($hasil);
		} else {
			$hasil = ["Setiap Hari"];
			$tanggal = json_encode($hasil);
		}


		echo $tanggal;
	}

	public function tambah_aksi(){
		$harga = $this->input->post('harga');
		$tujuan = $this->input->post('tujuan');
		$paket = $this->input->post('tanggal_keberangkatan');


		if($paket === "Setiap Hari"){
			$tanggal = $paket;
		} else {
			$waktu = explode('-', $paket);
	        $tanggalAwal = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0]));
	        $tanggalAkhir = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+($lama[$i]-1)*60*60*24);
	        $bulan = date("M", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
	        $tahun = date("Y", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
	        $tanggal = $tanggalAwal.' '.$bulan.' '.$tahun;	
		}
		

		$no_handphone = $this->input->post('no_handphone');
		$jumlah_penumpang = $this->input->post('jumlah_tiket');
		$harga_total = $this->input->post('harga');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$id_perjalanan = $this->input->post('id_tujuan');
		$status = $this->input->post('status');
		$data = array(
			'id_order' => '',
			'id_perjalanan' => $id_perjalanan,
			'nama' => $nama,
			'no_handphone' => $no_handphone,
			'email' => $email,
			'tujuan' => $tujuan,
			'paket' => $tanggal,
			'harga' => $harga,
			'jumlah_penumpang' => $jumlah_penumpang,
			'total_harga' => $harga_total,
			'status' => $status
		);
		$this->model_perjalanan->tambah('pesanan', $data);
		redirect('order');
	}

	public function alert(){
		$data = $this->model_perjalanan->tampil_data('notif_pesanan')->result();
		echo count($data);
	}

	public function hapus_alert(){
		$this->model_perjalanan->hapus_semua_data('notif_pesanan');
	}

}
