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

	// public function index()
	// {
	// 	if ($this->session->userdata('login_email')){
	// 		redirect(base_url('dashboard'));
	// 	}
		

	// 	if ($this->input->post('login_email')){
	// 			$email = $this->input->post('login_email');
	// 			$password = md5($this->input->post('login_password'));
				
	// 			$cek 		= $this->auth_model->cek_login($email,$password);
	// 			$total 		= $cek->num_rows();

	// 			if ($total > 0){
	// 					$hasil 	= $cek->row();
	// 					$sesi 	= array(
	// 						'user_login_id'  		=> $hasil->id,
	// 						'user_email'  			=> $hasil->email,
	// 						'user_name'     		=> $hasil->nama,
	// 						'user_no_hp'    		=> $hasil->nohp,
	// 						'user_alamat' 			=> $hasil->alamat,
	// 						'user_akses'    		=> $hasil->akses
	// 					);
	// 					$this->session->set_userdata($sesi);

	// 					redirect(base_url(), 'refresh');
	// 			} else {
	// 					$this->session->set_flashdata('error', 'Username atau password tidak valid');
	// 					redirect(base_url(), 'refresh');
	// 			}
	// 	}
	// 	// $this->load->view('login', $data);

	// 	// $data['database'] = $this->cart_model->get_cart();
	// 	// $data['title'] = 'Cart';
	// 	// $data['count_cart'] = $this->product_model->count_cart();
	// 	// $this->load->view('home/cart', $data);
	// }

	public function aksi_login(){

		$email = $this->input->post('login_email');
		$password = $this->input->post('login_password');
		$where = array(
			'email' 	=> $email,
			'password' 	=> $password,
			'akses'		=> '1'
			);
		$cek = $this->auth_model->cek_login("users",$where)->num_rows();
		$data_user = $this->auth_model->get_detail_user($email);
		// var_dump($data_user);
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

	    $this->form_validation->set_rules('name', 'Nama', 'required');
	    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[users.username]');
	    $this->form_validation->set_rules('password', 'Password', 'required|trim');
	    
	    if ($this->form_validation->run() == FALSE) {
	        $errors = $this->form_validation->error_array();
	        $this->session->set_flashdata('errors', $errors);
	        $this->session->set_flashdata('input', $this->input->post());
	        redirect('auth/register');
	    } else {
	        $username = $this->input->post('username');
	        $name = $this->input->post('name');
	        $password = $this->input->post('password');
	        $pass = password_hash($password, PASSWORD_DEFAULT);
	        $data = [
	            'username' => $username,
	            'name' => $name,
	            'password' => $pass
	        ];
	        $insert = $this->auth_model->register("users", $data);
	        if($insert){
	            echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="'.base_url('index.php/auth/login').'";</script>';
	        }
	    }
	} 
}
