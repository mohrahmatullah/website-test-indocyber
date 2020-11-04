<?php

class Cart_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_cart()
	{
		$this->db->select("tbl_keranjang.*, tbl_produk.nama_produk, tbl_produk.image");
		$this->db->from("tbl_keranjang");
		$this->db->join("tbl_produk","tbl_produk.id = tbl_keranjang.id_produk","left");
		$result = $this->db->get();

		return $result->result();

		// $query = $this->db->get('tbl_keranjang');
		// return $query->result();
	}

	public function delete_cart($id)
	{
		$this->db->delete('tbl_keranjang', ['id' => $id]);
	}

}

?>