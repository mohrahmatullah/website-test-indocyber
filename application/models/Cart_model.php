<?php

class Cart_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_cart()
	{
		$this->db->select("tbl_keranjang.*, tbl_produk.nama_produk, tbl_produk.image, tbl_produk.harga");
		$this->db->from("tbl_keranjang");
		$this->db->join("tbl_produk","tbl_produk.id = tbl_keranjang.id_produk","left");
		$this->db->where("tbl_keranjang.id_user", $this->session->userdata("id"));
		$result = $this->db->get();

		return $result->result();
	}

	public function delete_cart($id)
	{
		$this->db->delete('tbl_keranjang', ['id' => $id]);
	}

	public function cek_produk( $id_produk )
	{
		$this->db->select("*");
		$this->db->from("tbl_keranjang");
    	$this->db->where("id_produk", $id_produk);
    	$this->db->where("id_user", $this->session->userdata("id"));
		$result = $this->db->get();

		return $result->row();
	}

	public function update_cart( $data, $id_produk )
	{
		$this->db->update('tbl_keranjang', $data, $id_produk);
	}

	public function tambah_cart( $data )
	{
		$this->db->insert('tbl_keranjang', $data);
	}

}

?>