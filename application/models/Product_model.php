<?php

class Product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$query = $this->db->get('tbl_produk');
		return $query->result();
	}

}

?>