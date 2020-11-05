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

	public function add_to_cart( $id_produk )
	{
		$this->form_validation->set_rules('qty_beli', 'qty', 'required');
		if($this->form_validation->run() === FALSE){
			echo '<script>alert("Qty tidak boleh kosong !");window.location.href="'.base_url('detail/'.$id_produk).'";</script>';
		}else{
			$produk = $this->product_model->get_detail_data( $id_produk );
			if($this->session->userdata("id")){
				if($produk->stock < $this->input->post('qty_beli')){
					echo '<script>alert("Qty tidak memenuhi batas stock !");window.location.href="'.base_url('detail/'.$id_produk).'";</script>';
				}else{
					$cek = $this->cart_model->cek_produk( $id_produk );
					if($cek){		
						$kondisi_cart = ['id_produk' => $id_produk];
						$data_cart = [
									'qty' => $cek->qty + $this->input->post('qty_beli')
								];
						$this->cart_model->update_cart($data_cart, $kondisi_cart);

						$kondisi_produk = ['id' => $id_produk];
						$data_produk = [
									'stock' => $produk->stock - $this->input->post('qty_beli')
								];
						$this->product_model->update_cart_produk($data_produk, $kondisi_produk);
						redirect('cart');
					}else{
						$data_cart = [
							'id_user' => $this->session->userdata("id"),
							'id_produk' => $id_produk,
							'qty' => $this->input->post('qty_beli')
						];
						$this->cart_model->tambah_cart($data_cart);

						$kondisi_produk = ['id' => $id_produk];
						$data_produk = [
									'stock' => $produk->stock - $this->input->post('qty_beli')
								];
						$this->product_model->update_cart_produk($data_produk, $kondisi_produk);

						redirect('cart');
					}	
				}
			}else{
				echo '<script>alert("Anda harus masuk sebagai user untuk melanjutkan add to cart");window.location.href="'.base_url('detail/'.$id_produk).'";</script>';
			}
		}
		
	}

	public function deletecart($id, $id_produk, $qty)
	{
		$this->cart_model->delete_cart($id);

		$produk = $this->product_model->get_detail_data( $id_produk );
		$kondisi_produk = ['id' => $id_produk];
		$data_produk = [
							'stock' => $produk->stock + $qty
						];
		$this->product_model->update_cart_produk($data_produk, $kondisi_produk);
		$this->session->set_flashdata('hapus_sukses','Data cart berhasil di hapus');
		redirect('cart');
	}
}
