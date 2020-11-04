<?php

class Auth_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function register($table, $data)
	{
	    return $this->db->insert($table, $data);
	}

	public function get_detail_user($email)
	{
		$this->db->select("*");
		$this->db->from("users");
    	$this->db->where('email', $email);
		$result = $this->db->get();

		return $result->row();
	}

}

?>