<?php

class Cart_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_cart()
	{
		$query = $this->db->get('tbl_keranjang');
		return $query->result();
	}

	public function delete_cart($id)
	{
		$this->db->delete('tbl_keranjang', ['id' => $id]);
	}

}

?>