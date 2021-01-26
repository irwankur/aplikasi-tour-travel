<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Model {

	public function tampil_data($data)
	{
		return $this->db->get($data);
	}

	public function tampil_cari($table, $where){
		return $this->db->get_where($table, $where);
	}


	public function tambah($table, $data)
	{
		$this->db->insert($table, $data);
	}

}
