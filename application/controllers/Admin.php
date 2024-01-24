<?php

class Admin extends CI_Controller {


	public function __construct() {
  		parent::__construct();
  		$this->load->helper(array('form', 'url','file'));
	}

	public function index() {
		$this->load->view('admin/login');
	}

	public function proses_login() {
		$this->load->library('session');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$this->load->model('Admin_model','proses_login');
		$data['log'] = $this->proses_login->login($email,$password);
		$cek = count($data['log']);

		if($cek > 0) {
			$newdata = array(
				'id_user'=> $data['log'][0]['id_user'],
				'email' => $data['log'][0]['email'],
				'access_level' => $data['log'][0]['access_level']
			);

			$this->session->set_userdata($newdata);

			redirect(base_url().'admin/dashboard');

		} else {

			echo"<h3 align='center'>Ulangi Login</h3>";

		}

	}


	public function forgotpassword(){
		$this->load->view('admin/forgot');
	}

	public function dashboard() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/dashboard/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function users() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','users');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/users');
		$config['total_rows'] = $this->users->total_users();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['users'] = $this->users->getallusers($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/users/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function add_users() {
		
		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','city');
		$t['city'] = $this->city->getallcity();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/users/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
		
	}

	public function insert_users() {
		$this->load->model('Admin_model','users');
		$this->users->insert_users();
		redirect(base_url('admin/users'));
	}


	public function edit_users() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','users');
		$t['detail'] = $this->users->select_users($id);
		$t['city'] = $this->users->getallcities();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/users/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function update_users() {
		$this->load->model('Admin_model','users');
		$this->users->update_users();
		redirect(base_url('admin/users'));
	}


	public function delete_users() {
		$id =  $this->uri->segment(3);
		$image =  $this->uri->segment(4);
		$this->load->model('Admin_model','users');
		$this->users->delete_users($id,$image);
		redirect(base_url('admin/users'));
	}


	public function package_active() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','package');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/package_active');
		$config['total_rows'] = $this->package->total_packageactived();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['package'] = $this->package->getallpackageactived($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/content_active',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function package_pending() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','package');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/package_active');
		$config['total_rows'] = $this->package->total_packagepending();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['package'] = $this->package->getallpackagepending($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/content_pending',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function package_expired() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','package');
		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/package_active');
		$config['total_rows'] = $this->package->total_packageexpired();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['package'] = $this->package->getallpackageexpired($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/content_expired',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function add_package() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','package_category');
		$t['cp'] = $this->package_category->getallpackagecategory();
		$t['cities'] = $this->package_category->getallcities();
		$t['country'] = $this->package_category->listcountry();
		$t['province'] = $this->package_category->listprovince();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/add_package',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function add_photo_package() {
		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','package');
		$t['package'] = $this->package->select_package($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/add_photo',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function insert_package() {
		$this->load->model('Admin_model','package');
		$this->package->insert_package();
		$this->session->set_flashdata('msg', 'New Package has been successfully added!');
		redirect(base_url('admin/add_package'));
	}

	public function insert_photo_package() {
		$id = $this->input->post('id_package');
		$this->load->model('Admin_model','package');
		$this->package->insert_photo_package();
		$this->session->set_flashdata('msg', 'New Photo has been successfully added!');
		redirect(base_url('admin/add_photo_package/'.$id));
	}


	public function edit_package() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','package');
		$t['detail'] = $this->package->select_package($id);
		$t['cp'] = $this->package->getallpackagecategory();
		$t['cities'] = $this->package->getallcities();
		$t['country'] = $this->package->listcountry();
		$t['province'] = $this->package->listprovince();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/edit_package',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function detail_package() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','package');
		$t['detail'] = $this->package->select_package($id);
		$t['photo'] = $this->package->getallphotopackage($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package/detail_package',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function update_package() {
		$id = $this->input->post('id_package');
		$this->load->model('Admin_model','package');
		$this->package->update_package();
		$this->session->set_flashdata('msg', 'Package has been successfully Update!');
		redirect(base_url('admin/edit_package/'.$id));
	}

	public function delete_gallery() {
		$id = $this->uri->segment(3);
		$idgallery = $this->uri->segment(4);
		$origin = $this->uri->segment(5);
		$thumbnail = $this->uri->segment(6);
		$this->load->model('Admin_model','package');
		$this->package->delete_gallery($idgallery,$origin,$thumbnail);
		$this->session->set_flashdata('msg', 'Package has been successfully Deleted!');
		redirect(base_url('admin/detail_package/'.$id));
	}


	public function delete_package() {
		$cat = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$this->load->model('Admin_model','package');
		$this->package->delete_package($id);
		redirect(base_url('admin/'.$cat));
	}



	public function blog() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','blog');

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/blog');
		$config['total_rows'] = $this->blog->total_blogs();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['blog'] = $this->blog->getallblog($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/blog/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function add_blog() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/blog/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	
	public function insert_blog() {

		$this->load->model('Admin_model','blog');
		$this->blog->insert_blog();
		redirect(base_url('admin/blog'));
	}
	

	public function edit_blog() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','blog');
		$t['detail'] = $this->blog->select_blog($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/blog/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function update_blog() {

		$this->load->model('Admin_model','blog');
		$this->blog->update_blog();
		redirect(base_url('admin/blog'));
	}


	public function delete_blog() {
		$id =  $this->uri->segment(3);
		$image =  $this->uri->segment(4);
		$this->load->model('Admin_model','blog');
		$this->blog->delete_blog($id,$image);
		redirect(base_url('admin/blog'));
	}


	public function city() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','city');

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/city');
		$config['total_rows'] = $this->city->total_city();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$t['city'] = $this->city->getallcity($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/city/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function add_city() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','city');
		$t['province'] = $this->city->listprovince();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/city/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function insert_city() {

		$this->load->model('Admin_model','city');
		$this->city->insert_city();
		redirect(base_url('admin/city'));
	}

	public function edit_city() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);	
		$this->load->model('Admin_model','city');
		$t['city'] = $this->city->select_city($id);
		$t['province'] = $this->city->listprovince();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/city/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function update_city() {

		$this->load->model('Admin_model','city');
		$this->city->update_city();
		redirect(base_url('admin/city'));
	}

	public function delete_city() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','city');
		$this->city->delete_city($id);
		redirect(base_url('admin/city'));
	}


	public function country() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','country');

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/country');
		$config['total_rows'] = $this->country->total_country();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$t['country'] = $this->country->getallcountry($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/country/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function add_country() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/country/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function insert_country() {

		$this->load->model('Admin_model','country');
		$this->country->insert_country();
		redirect(base_url('admin/country'));
	}

	public function edit_country() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);	
		$this->load->model('Admin_model','country');
		$t['country'] = $this->country->select_country($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/country/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function update_country() {

		$this->load->model('Admin_model','country');
		$this->country->update_country();
		redirect(base_url('admin/country'));
	}

	public function delete_country() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','country');
		$this->country->delete_country($id);
		redirect(base_url('admin/country'));
	}



	public function province() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','province');

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/province');
		$config['total_rows'] = $this->province->total_province();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$t['province'] = $this->province->getallprovince($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/province/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	
	public function add_province() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','province');
		$t['country'] = $this->province->listcountry();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/province/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function insert_province() {

		$this->load->model('Admin_model','country');
		$this->country->insert_province();
		redirect(base_url('admin/province'));
	}

	public function edit_province() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);	
		$this->load->model('Admin_model','province');
		$t['province'] = $this->province->select_province($id);
		$t['country'] = $this->province->listcountry();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/province/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function update_province() {

		$this->load->model('Admin_model','province');
		$this->province->update_province();
		redirect(base_url('admin/province'));
	}

	public function delete_province() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','province');
		$this->province->delete_province($id);
		redirect(base_url('admin/province'));
	}


	public function comments() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','comments');

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/comments');
		$config['total_rows'] = $this->comments->total_comments();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$t['comments'] = $this->comments->getallcomments($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/comments/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function delete_comment() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','comments');
		$this->comments->delete_comments($id);
		redirect(base_url('admin/comments'));
	}
	

	public function package_category() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','package_category');
		$t['package_category'] = $this->package_category->getallpackagecategory();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package_category/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function add_package_category() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package_category/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	
	public function insert_package_category() {
		$this->load->model('Admin_model','package_category');
		$this->package_category->insert_package_category();
		redirect(base_url('admin/package_category'));
	}


	public function edit_package_category() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);	
		$this->load->model('Admin_model','package_category');
		$t['package_category'] = $this->package_category->select_package_category($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/package_category/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function update_package_category() {
		$this->load->model('Admin_model','package_category');
		$this->package_category->update_package_category();
		redirect(base_url('admin/package_category'));
	}

	public function delete_package_category() {
		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','package_category');
		$this->package_category->delete_package_category($id);
		redirect(base_url('admin/package_category'));
	}

	public function subscriber() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','subscriber');
		$t['subscriber'] = $this->subscriber->getallsubscriber();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/subscriber/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function delete_subscriber() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','subscriber');
		$this->subscriber->delete_subscribers($id);
		redirect(base_url('admin/subscriber'));
	}
	
	public function testimonial() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','testimonial');
		$t['testimonial'] = $this->testimonial->getalltestimonial();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/testimonial/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function add_testimonial() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/testimonial/add',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function insert_testimonial() {

		$id = $this->uri->segment(3);
		$this->load->model('Admin_model','testimonial');
		$this->testimonial->insert_testimonials($id);
		redirect(base_url('admin/testimonial'));
	}

	public function edit_testimonial() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id = $this->uri->segment(3);	
		$this->load->model('Admin_model','testimonial');
		$t['testimonial'] = $this->testimonial->select_testimonial($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/testimonial/edit',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}


	public function update_testimonial() {
		$this->load->model('Admin_model','testimonial');
		$this->testimonial->update_testimonials($id);
		redirect(base_url('admin/testimonial'));
	}


	public function delete_testimonial() {
		$id =  $this->uri->segment(3);
		$image =  $this->uri->segment(4);
		$this->load->model('Admin_model','testimonial');
		$this->testimonial->delete_testimonial($id,$image);
		redirect(base_url('admin/testimonial'));
	}

	public function booking() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->model('Admin_model','booking');
		$t['booking'] = $this->booking->listbooking();
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/booking/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function delete_booking() {
		$id =  $this->uri->segment(3);
		$this->load->model('Admin_model','booking');
		$this->booking->delete_bookings($id);
		redirect(base_url('admin/booking'));
	}

	public function approve_booking() {
		$id =  $this->uri->segment(3);
		$this->load->model('Admin_model','booking');
		$this->booking->approve_bookings($id);
		redirect(base_url('admin/booking'));
	}

	public function detail_booking() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$id =  $this->uri->segment(3);
		$this->load->model('Admin_model','booking');
		$t['detail'] = $this->booking->detailbooking($id);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/booking/detail',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function wishlist() {

		$t['info'] = $this->session->userdata('email');
		if($t['info'] == TRUE){
		$this->load->library('pagination');
		$this->load->model('Admin_model','wishlist');
		$config['base_url'] = base_url('admin/wishlist');
		$config['total_rows'] = $this->wishlist->gettotalwishlish();
		$config['per_page'] = 15;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['cur_tag_open'] = '&nbsp; &nbsp; <a class="current"> &nbsp; &nbsp;';
		$config['cur_tag_close'] = '&nbsp; &nbsp; </a> &nbsp; &nbsp;';
		$config['next_link'] = ' &nbsp; &nbsp; Next &nbsp; &nbsp; ';
		$config['prev_link'] = ' &nbsp; &nbsp; Previous &nbsp; &nbsp;';
		$this->pagination->initialize($config);
		$d['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$t['wishlist'] = $this->wishlist->getallwishlist($d['page'],$config["per_page"]);
		$a['header'] =  $this->load->view('layout/header_backend',null, true);
		$a['footer'] =  $this->load->view('layout/footer_backend',null, true);
		$a['content'] =  $this->load->view('admin/wishlist/content',$t, true);
		$page = $this->load->view('layout/layout_backend',$a);
		return $page;
		}else{
			redirect(base_url().'admin');
		}
	}

	public function logout ()
		{
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}
	
}
