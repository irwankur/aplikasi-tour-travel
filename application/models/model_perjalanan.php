<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perjalanan extends CI_Model {

	public function tampil_data($data)
	{
		return $this->db->get($data);
	}

	public function tampil_cari($table, $where){
		return $this->db->get_where($table, $where);
	}

	public function tampil_testimoni($table, $where){
		$this->db->from($table);
		$this->db->where($where);
		$this->db->limit(15);
		return $this->db->get();
	}

	public function tampil_cari_perjalanan($table, $where){
		$this->db->from($table);
		$this->db->where($where);
		$this->db->limit(9);
		return $this->db->get();
	}

	public function data($number, $offset){
		return $this->db->get('data_perjalanan', $number, $offset)->result();
	}

	public function tampil_medsos(){
		$this->db->select('*');
		$this->db->where('link IS NOT NULL');
		return $this->db->get('medsos');
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

	public function ubah_medsos($where, $data){
		$this->db->set('link', $data);
		$this->db->where('nama', $where);
		$this->db->update('medsos');
	}

	public function tampil_notif()
	{
		$this->db->from('notifikasi');
		$this->db->order_by("id_notif", "DESC");
		$this->db->limit(4);
		$query = $this->db->get(); 
		return $query->result();
	}

	public function hapus($table, $where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function hapus_semua_data($table){
		$this->db->empty_table($table);
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

	public function update_status($status, $id){
		$this->db->query("UPDATE pesanan SET status = '$status' WHERE id_order = $id ");
	}

	public function ubah_password($tabel, $password, $where){
		$this->db->set('password', $password);
		$this->db->where($where);
		$this->db->update($tabel);
	}

	public function update_status_tampil($status, $id){
		$this->db->query("UPDATE rekening SET status = '$status' WHERE id_rekening = $id ");
	}

	public function status_tampil($status, $id){
		$this->db->query("UPDATE testimoni SET status = '$status' WHERE id_testimoni = $id ");
	}

	public function tampil_data_perjalanan(){
		$query = $this->db->query('SELECT tujuan, id_perjalanan, harga FROM data_perjalanan');
		return $query->result();
	}

	public function tampil_tanggal($id){
		$query = $this->db->query("SELECT tanggal_keberangkatan FROM data_perjalanan WHERE id_perjalanan = '$id'");
		return $query->result();
	}

	public function update_favorit($id, $data){
		$this->db->query("UPDATE data_perjalanan SET favorit = $data WHERE id_perjalanan = $id");	
	}

	public function delete_multi($id, $table, $column){
		$this->db->where_in($column, $id );
		$this->db->delete($table);
	}


}
