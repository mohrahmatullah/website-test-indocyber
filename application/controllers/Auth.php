<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function aksi_login(){

		$email = $this->input->post('login_email');
		$password = $this->input->post('login_password');
		$where = array(
			'email' 	=> $email,
			'password' 	=> md5($password),
			'akses'		=> '1'
			);
		$cek = $this->auth_model->cek_login("users",$where)->num_rows();
		$data_user = $this->auth_model->get_detail_user($email);
		if($cek > 0){
 			
			$data_session = array(
				'email' => $email,
				'status' => "login",
				'id'		=> $data_user->id	
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("/"));
 
		}else{
			echo '<script>alert("Username dan password salah !");window.location.href="'.base_url('/').'";</script>';
		}
	}
 
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}

	public function proses_register()
	{
	    $this->form_validation->set_rules('reg_email', 'email', 'required');
	    $this->form_validation->set_rules('reg_nama', 'nama', 'required');
	    $this->form_validation->set_rules('reg_password', 'password', 'required|trim');
	    
	    if ($this->form_validation->run() == FALSE) {
	        $errors = $this->form_validation->error_array();
	        $this->session->set_flashdata('errors', $errors);
	        $this->session->set_flashdata('input', $this->input->post());
	        redirect('/');
	    } else {
	        $email = $this->input->post('reg_email');
	        $name = $this->input->post('reg_nama');
	        $password = $this->input->post('reg_password');

	        $pass = password_hash($password, PASSWORD_DEFAULT);
	        $data = [
	            'email' => $this->input->post('reg_email'),
	            'nama' => $this->input->post('reg_nama'),
	            'password' => md5($this->input->post('reg_password')),
	            'nohp' => $this->input->post('reg_no_hp'),
	            'alamat' => $this->input->post('reg_alamat'),
	            'akses' => '1',
	        ];
	        $insert = $this->auth_model->register("users", $data);

	        $data_user = $this->auth_model->get_detail_user($this->input->post('reg_email'));
	        $data_session = array(
				'email' => $email,
				'status' => "login",
				'id'		=> $data_user->id	
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("/"));
	    }
	} 
}
