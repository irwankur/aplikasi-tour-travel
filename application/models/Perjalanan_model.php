<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan_model extends CI_Model {

	public function tampil_data($data)
	{
		return $this->db->get($data);
	}

	public function tampil_cari($table, $where){
		return $this->db->get_where($table, $where);
	}

	public function data($number, $offset){
		return $this->db->get('data_perjalanan', $number, $offset)->result();
	}

	public function upload()
	{
		if($this->upload->do_upload('gambar')){
			$return = array (
				'result'	=> 'success', 
				'file' 		=> $this->upload->data(),
				'error' 	=> '');
			return $return;
		} else {
			$return = array(
				'result' 	=> 'failed', 
				'file' 		=> '',
				'error' 	=> $this->upload->display_errors());
			return $return;
		}
	}

	public function tambah($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function hapus_in($id, $table, $where){
		$this->db->where_in($id, $where);
		$this->db->delete($table);
	}

	public function hapus($table, $where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ubah($table, $where, $data){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function cari($keyword){
		$this->db->like('tujuan', $keyword);
		$this->db->or_like('tanggal_keberangkatan', $keyword);
		$this->db->or_like('keterangan', $keyword);
		$this->db->or_like('harga', $keyword);
		
		$query = $this->db->get('data_perjalanan');
		return $query->result();
	}
}
