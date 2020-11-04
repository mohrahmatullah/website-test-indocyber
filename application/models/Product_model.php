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

	public function get_detail_data($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_produk");
    	$this->db->where('id', $id);
		$result = $this->db->get();

		return $result->row();

		// $query = $this->db->get('tbl_produk');
		// return $query->result();
	}

	public function count_cart()
	{
		$query = $this->db->get('tbl_keranjang');
		return $query->num_rows();
	}

}

?>