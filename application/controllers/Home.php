<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model('product_model');
		$this->load->helper(['url_helper', 'form', 'helpers_helper']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function index()
	{
		$data['database'] = $this->product_model->get_all_data();
		$data['count_cart'] = $this->product_model->count_cart();
		$data['title'] = 'Shop | Home';
		$this->load->view('home/index', $data);
	}

	public function detail( $id )
	{
		$data['title'] = 'Shop | Detail';
		$data['database'] = $this->product_model->get_detail_data($id);
		$data['count_cart'] = $this->product_model->count_cart();
		$this->load->view('Home/detail-product', $data);
	}
}
