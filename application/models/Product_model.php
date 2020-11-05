<?php

class Product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$this->db->from("tbl_produk");
		$this->db->order_by("created_at", "DESC");
		$query = $this->db->get();

		// $query = $this->db->get('tbl_produk');
		return $query->result();
	}

	public function get_detail_data($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_produk");
    	$this->db->where('id', $id);
		$result = $this->db->get();

		return $result->row();
	}

	public function count_cart()
	{
		$this->db->from("tbl_keranjang");
		$this->db->where("tbl_keranjang.id_user", $this->session->userdata("id"));
		$result = $this->db->get();
		
		return $result->num_rows();
	}

	public function update_cart_produk( $data, $id_produk )
	{
		$this->db->update('tbl_produk', $data, $id_produk);
	}

}

?>