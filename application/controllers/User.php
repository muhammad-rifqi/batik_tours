<?php

class User extends CI_Controller {

	public function __construct() {
  		parent::__construct();
  		$this->load->helper(array('form', 'url','file'));
			$this->load->library('session');

	}

	public function index() {
		$this->load->model('User_model','package');
		$t['testimonial'] = $this->package->testimonial();
		$t['blog'] = $this->package->blog();
		$t['package'] = $this->package->package();
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('home/content',$t, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}

	public function international() {
		$this->load->model('User_model','package');
		$t['international'] = $this->package->internationals();
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('international/content',$t, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}

	public function detail_package() {
			$id = $this->uri->segment(2);
			$this->load->model('User_model','package');
			$t['detail'] = $this->package->detail_package($id);
			$idpackage = $this->package->id_packages($id);
			$t['gallery'] = $this->package->photo_package($idpackage);
			$t['comment'] = $this->package->getallcomment($idpackage);
			$a['header'] =  $this->load->view('layout/header_frontend',null, true);
			$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
			$a['content'] =  $this->load->view('detail/content',$t, true);
			$page = $this->load->view('layout/layout_frontend',$a);
			return $page;
	}


	public function domestic() {
			$this->load->model('User_model','package');
			$t['domestic'] = $this->package->domestics();
			$a['header'] =  $this->load->view('layout/header_frontend',null, true);
			$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
			$a['content'] =  $this->load->view('domestic/content',$t, true);
			$page = $this->load->view('layout/layout_frontend',$a);
			return $page;
	}

	public function cart() {

		$this->load->model('User_model','cart');
		$t['cart'] = $this->cart->getallcart();
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('cart/content',$t, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}


	public function insert_cart() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','cart');
		$this->cart->insert_carts($id);
		redirect(base_url('cart'));
	}

	public function delete_cart() {
		$id = $this->uri->segment(3);
		$this->load->model('User_model','cart');
		$this->cart->delete_carts($id);
		redirect(base_url('cart'));
	}


	public function order() {
			$this->load->model('User_model','order');
			$t['country'] = $this->order->getallcountry();
			$a['header'] =  $this->load->view('layout/header_frontend',null, true);
			$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
			$a['content'] =  $this->load->view('order/content',$t, true);
			$page = $this->load->view('layout/layout_frontend',$a);
			return $page;
	}

	public function insert_customer() {
		$this->load->model('User_model','customer');
		$this->customer->insert_customers();
		redirect(base_url('process'));
	}

	public function process(){
		$this->load->model('User_model','customer');
		$t['detail'] = $this->customer->detail_customers();
		$t['data'] = $this->customer->data_customers();
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('order/process',$t, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}


	public function provinced(){
		$id = $this->uri->segment(3);
		$this->load->model('User_model','provinced');
		$data = $this->provinced->getallprovince($id);
		for($i=0;$i<count($data);$i++){
			echo "<option value='".$data[$i]['id_province']."'>".$data[$i]['name']."</option>";	
		}
	}

	public function listcities(){
		$id = $this->uri->segment(3);
		$this->load->model('User_model','listcities');
		$data = $this->listcities->getallcities($id);
		for($i=0;$i<count($data);$i++){
			echo "<option value='".$data[$i]['id_cities']."'>".$data[$i]['cities_name']."</option>";	
		}
	}


	public function notfound() {
			$a['header'] =  $this->load->view('layout/header_frontend',null, true);
			$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
			$a['content'] =  $this->load->view('404',null, true);
			$page = $this->load->view('layout/layout_frontend',$a);
			return $page;
	}


	public function insert_comment() {
		$slug = $this->input->post('slug');
		$this->load->model('User_model','comment');
		$this->comment->insert_comments();
		redirect(base_url('detail-package/'.$slug));
	}


	
	public function update_quantity() {
		$this->load->model('User_model','q');
		$this->q->update_quantitys();
		redirect(base_url('cart'));
	}

	public function insert_subscriber() {
		$this->load->model('User_model','sub');
		$this->sub->insert_subscribers();
		redirect(base_url('sent'));
	}

	public function sent() {
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('sent',null, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}

	public function searching() {
		$this->load->model('User_model','package');
		$t['search'] = $this->package->searchs();
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('home/search',$t, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}

	public function invoice() {
		$id = $this->uri->segment(2);
		$this->load->model('User_model','invoice');
		$t['detail'] = $this->invoice->invoices($id);
		$this->load->view('order/invoice',$t);
		
	}

	public function corporation() {
		$a['header'] =  $this->load->view('layout/header_frontend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_frontend',null, true);
		$a['content'] =  $this->load->view('corporation/content',null, true);
		$page = $this->load->view('layout/layout_frontend',$a);
		return $page;
	}


	public function add_wishlist(){

		$id = $this->uri->segment(2);
		$this->load->model('User_model','wishlist');
		$t['detail'] = $this->wishlist->add_wishlists($id);
		redirect(base_url('/'));

	}

}


