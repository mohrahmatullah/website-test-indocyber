<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
		$this->load->model('cart_model');
		$this->load->model('product_model');
		$this->load->helper(['url_helper', 'form']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function index()
	{
		$data['database'] = $this->cart_model->get_cart();
		$data['title'] = 'Cart';
		$data['count_cart'] = $this->product_model->count_cart();
		$this->load->view('home/cart', $data);
	}

	public function deletecart($id)
	{
		$this->cart_model->delete_cart($id);
		$this->session->set_flashdata('hapus_sukses','Data cart berhasil di hapus');
		redirect('cart');
	}
}
