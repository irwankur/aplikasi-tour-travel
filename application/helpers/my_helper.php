<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

	function my_number_format($number){
		if ($number == '') $number = 0;
		return number_format($number, 0, ',', '.');
	}

	function cek_session(){
		$CI =& get_instance();
		$user = $CI->session->userdata('pengguna');
		if(!isset($user)){
			redirect(base_url());
		}
	}

	function cek_login_member(){
		$CI =& get_instance();
		$user = $CI->session->userdata('pengguna');
		if(isset($user)){
			redirect(base_url('member'));
		}
	}

	function cek_session_admin(){
		$CI =& get_instance();
		$user = $CI->session->userdata('admin');
		if(!isset($user)){
			redirect(base_url());
		} 
	}


	function cek_login_admin(){
		$CI =& get_instance();
		$user = $CI->session->userdata('admin');
		if(isset($user)){
			redirect(base_url('data_perjalanan'));
		} 
	}


	function potong_string($string){
		$hasil = substr($string, 0, 150);
		return $hasil;
	}

	function harga($harga){
		$harga = explode(",", $harga);
		$awal = $harga[0];
		return $awal; 

	}

	function gen_tanggal($tanggal, $lama){
		$tanggal = unserialize($tanggal);
		$lama = unserialize($lama);
	 	$total = count($lama);
		for($i=0; $i<$total; $i++) {
			$waktu = explode('-', $tanggal[$i]);
	        $tanggalAwal = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0]));
	        $tanggalAkhir = date("d", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+($lama[$i]-1)*60*60*24);
	        $bulan = date("M", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
	        $tahun = date("Y", mktime(0,0,0,$waktu[1],$waktu[2],$waktu[0])+$lama[$i]*60*60*24);
			echo $tanggalAwal." - ".$tanggalAkhir."  ".$bulan." ".$tahun." - ".$lama[$i]." hari <br>";
		} 
	}
?>