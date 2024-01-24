<?php

class Admin_model extends CI_Model {


public function __construct()
{
	parent::__construct();
	$this->load->helper(array('form', 'url','file'));
}

public function login($email,$password)
	{
		$sql = $this->db->query("select * from user where email='".$email."' and password='".$password."'");
		$data = $sql->result_array();
		return $data;
	}

//users

public function getallusers($limit,$start)
{
	$data = $this->db->query("select * from user limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($data);$i++){
		$row[] = array(
			"id_user"=>$data[$i]['id_user'],
			"firstname"=>$data[$i]['firstname'],
			"lastname"=>$data[$i]['lastname'],
			"email"=>$data[$i]['email'],
			"password"=>$data[$i]['password'],
			"phone"=>$data[$i]['phone'],
			"city"=>$this->convert_city($data[$i]['city']),
			"address"=>$data[$i]['address'],
			"photo"=>$data[$i]['photo'],
			"birthdate"=>$data[$i]['birthdate'],
			"access_level"=>$data[$i]['access_level'],
			"token"=>$data[$i]['token'],
		);
	}
	return $row;
}

public function convert_id($id){
	$data = $this->db->query("select * from user where id_user = '".$id."'")->result_array();
	return $data[0]['email'];
}

public function convert_city($id_cities){
	$data = $this->db->query("select * from cities where id_cities = '".$id_cities."'")->result_array();
	return $data[0]['cities_name'];
}

public function convert_country($id){
	$data = $this->db->query("select * from country where id_country = '".$id."'")->result_array();
	return $data[0]['name'];
}

public function convert_province($id){
	$data = $this->db->query("select * from province where id_province = '".$id."'")->result_array();
	return $data[0]['name'];
}


public function select_users($id)
{
	$sql = $this->db->query("select * from user where id_user = '".$id."'")->result_array();
	return $sql;

}

public function total_users()
{
	$sql = $this->db->query("select * from user")->num_rows();
	return $sql;

}

public function insert_users(){

	$foto = $_FILES['photo']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/user/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/user/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('photo');
		
		if($this->upload->data()){
		
			$data = array(
				'firstname'=>$this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'phone'=>$this->input->post('phone'),
				'city'=>$this->input->post('city'),
				'address'=>$this->input->post('address'),
				'photo'=>$url,
				'birthdate'=>$this->input->post('years').'-'.$this->input->post('month').'-'.$this->input->post('days')
			);
			$this->db->insert('user',$data);
		}
	}
}

public function update_users(){
	$id = $this->input->post('id_user');
	$foto = $_FILES['photo']['name'];
	if(!empty($foto) && !empty($this->input->post('password'))) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/user/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/user/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('photo');
		
		if($this->upload->data()){
			$data = array(
				'firstname'=>$this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'phone'=>$this->input->post('phone'),
				'city'=>$this->input->post('city'),
				'address'=>$this->input->post('address'),
				'photo'=>$url,
				'birthdate'=>$this->input->post('years').'-'.$this->input->post('month').'-'.$this->input->post('days')
			);
		}
	}else{
		$data = array(
			'firstname'=>$this->input->post('firstname'),
			'lastname'=>$this->input->post('lastname'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'city'=>$this->input->post('city'),
			'address'=>$this->input->post('address'),
			'birthdate'=>$this->input->post('years').'-'.$this->input->post('month').'-'.$this->input->post('days')
		);
	}
	$this->db->where('id_user',$id);
	$this->db->update('user',$data);
}

public function delete_users($id,$image){
	unlink(realpath(APPPATH.'../assets/upload/user/'.$image));
	return $this->db->query("delete from user where id_user = '".$id."'");
}

//Product

public function getallpackageactived($limit,$start)
{
	$sql = $this->db->query("select * from package where package_status = '1' limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($sql);$i++){
		$row[] = array(
			"id_package" => $sql[$i]['id_package'],
			"package_category_id" => $sql[$i]['package_category_id'],
			"package_name" => $sql[$i]['package_name'],
			"sub_package_name" => $sql[$i]['sub_package_name'],
			"slug" => $sql[$i]['slug'],
			"price" => $sql[$i]['price'],
			"promo" => $sql[$i]['promo'],
			"discount" => $sql[$i]['discount'],
			"star" => $sql[$i]['star'],
			"photo" => $sql[$i]['photo'],
			"description" => $sql[$i]['description'],
			"itinerary" => $sql[$i]['itinerary'],
			"reviews" => $sql[$i]['reviews'],
			"location" => $sql[$i]['location'],
			"country" => $this->convert_country($sql[$i]['country']),
			"province" => $this->convert_province($sql[$i]['province']),
			"cities" => $this->convert_city($sql[$i]['cities']),
			"pax" => $sql[$i]['pax'],
			"day" => $sql[$i]['day'],
			"night" => $sql[$i]['night'],
			"family" => $sql[$i]['family'],
			"date" => $sql[$i]['date'],
			"post_status" => $sql[$i]['post_status'],
			"package_status" => $sql[$i]['package_status'],
			"post_by" => $sql[$i]['post_by'],
			"origin" => $sql[$i]['origin'],
			"thumbnail" => $sql[$i]['thumbnail'],
		);
	}
	return $row;

}


public function total_packageactived()
{
	$sql = $this->db->query("select * from package where package_status = '1'")->num_rows();
	return $sql;

}

public function getallpackagepending($limit,$start)
{
	$sql = $this->db->query("select * from package where package_status = '2' limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($sql);$i++){
		$row[] = array(
			"id_package" => $sql[$i]['id_package'],
			"package_category_id" => $sql[$i]['package_category_id'],
			"package_name" => $sql[$i]['package_name'],
			"sub_package_name" => $sql[$i]['sub_package_name'],
			"slug" => $sql[$i]['slug'],
			"price" => $sql[$i]['price'],
			"promo" => $sql[$i]['promo'],
			"discount" => $sql[$i]['discount'],
			"star" => $sql[$i]['star'],
			"photo" => $sql[$i]['photo'],
			"description" => $sql[$i]['description'],
			"itinerary" => $sql[$i]['itinerary'],
			"reviews" => $sql[$i]['reviews'],
			"location" => $sql[$i]['location'],
			"country" => $this->convert_country($sql[$i]['country']),
			"province" => $this->convert_province($sql[$i]['province']),
			"cities" => $this->convert_city($sql[$i]['cities']),
			"pax" => $sql[$i]['pax'],
			"day" => $sql[$i]['day'],
			"night" => $sql[$i]['night'],
			"family" => $sql[$i]['family'],
			"date" => $sql[$i]['date'],
			"post_status" => $sql[$i]['post_status'],
			"package_status" => $sql[$i]['package_status'],
			"post_by" => $sql[$i]['post_by'],
			"origin" => $sql[$i]['origin'],
			"thumbnail" => $sql[$i]['thumbnail'],
		);
	}
	return $row;

}

public function total_packagepending()
{
	$sql = $this->db->query("select * from package where package_status = '2'")->num_rows();
	return $sql;

}

public function getallpackageexpired($limit,$start)
{
	$sql = $this->db->query("select * from package where package_status = '3' limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($sql);$i++){
		$row[] = array(
			"id_package" => $sql[$i]['id_package'],
			"package_category_id" => $sql[$i]['package_category_id'],
			"package_name" => $sql[$i]['package_name'],
			"sub_package_name" => $sql[$i]['sub_package_name'],
			"slug" => $sql[$i]['slug'],
			"price" => $sql[$i]['price'],
			"promo" => $sql[$i]['promo'],
			"discount" => $sql[$i]['discount'],
			"star" => $sql[$i]['star'],
			"photo" => $sql[$i]['photo'],
			"description" => $sql[$i]['description'],
			"itinerary" => $sql[$i]['itinerary'],
			"reviews" => $sql[$i]['reviews'],
			"location" => $sql[$i]['location'],
			"country" => $sql[$i]['country'],
			"province" => $this->convert_province($sql[$i]['province']),
			"cities" => $this->convert_city($sql[$i]['cities']),
			"pax" => $sql[$i]['pax'],
			"day" => $sql[$i]['day'],
			"night" => $sql[$i]['night'],
			"family" => $sql[$i]['family'],
			"date" => $sql[$i]['date'],
			"post_status" => $sql[$i]['post_status'],
			"package_status" => $sql[$i]['package_status'],
			"post_by" => $sql[$i]['post_by'],
			"origin" => $sql[$i]['origin'],
			"thumbnail" => $sql[$i]['thumbnail'],
		);
	}
	return $row;

}

public function total_packageexpired()
{
	$sql = $this->db->query("select * from package where package_status = '3'")->num_rows();
	return $sql;

}

public function insert_package(){

	$this->load->library('session');
	$this->load->helper('slug');
	$foto = $_FILES['foto']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/package/thumbnail/'.time().'_thumb'.'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/package/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$uploadedImage = $this->upload->data();
		if($uploadedImage){
			$this->resizeImage($uploadedImage['file_name']);
		}

		$data = array(
			'package_category_id'=>$this->input->post('package_category_id'),
			'package_name'=>$this->input->post('package_name'),
			'sub_package_name'=>$this->input->post('sub_package_name'),
			'price'=>$this->input->post('price'),
			'slug'=>slug_url($this->input->post('package_name')),
			'promo'=>$this->input->post('promo'),
			'discount'=>$this->input->post('discount'),
			'star'=> 1 ,
			'photo'=> $url,
			'description'=>$this->input->post('description'),
			'itinerary'=> $this->input->post('itinerary'),
			'reviews'=> $this->input->post('reviews'),
			'location'=> $this->input->post('latitude').','.$this->input->post('longitude'),
			'country'=> $this->input->post('country'),
			'province'=> $this->input->post('province'),
			'cities'=> $this->input->post('cities'),
			'pax'=> $this->input->post('pax'),
			'day'=> $this->input->post('day'),
			'night'=> $this->input->post('night'),
			'family'=> $this->input->post('family'),
			'date'=> date("Y-m-d"),
			'post_status'=> $this->input->post('post_status'),
			'package_status'=> $this->input->post('package_status'),
			'post_by'=>$this->session->userdata('email'),
			'origin'=>time().'.'.$ext,
			'thumbnail'=>time().'_thumb'.'.'.$ext
		);
		$this->db->insert('package',$data);
	}

}



public function update_package(){
	$this->load->library('session');
	$this->load->helper('slug');
	$id = $this->input->post('id_package');
	$foto = $_FILES['foto']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/package/thumbnail/'.time().'_thumb'.'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/package/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$uploadedImage = $this->upload->data();
        if($uploadedImage){
			$this->resizeImage($uploadedImage['file_name']);
		}
		
		$data = array(
			'package_category_id'=>$this->input->post('package_category_id'),
			'package_name'=>$this->input->post('package_name'),
			'sub_package_name'=>$this->input->post('sub_package_name'),
			'price'=>$this->input->post('price'),
			'slug'=>slug_url($this->input->post('package_name')),
			'promo'=>$this->input->post('promo'),
			'discount'=>$this->input->post('discount'),
			'star'=> 1 ,
			'photo'=> $url,
			'description'=>$this->input->post('description'),
			'itinerary'=> $this->input->post('itinerary'),
			'reviews'=> $this->input->post('reviews'),
			'location'=> $this->input->post('latitude').','.$this->input->post('longitude'),
			'country'=> $this->input->post('country'),
			'province'=> $this->input->post('province'),
			'cities'=> $this->input->post('cities'),
			'pax'=> $this->input->post('pax'),
			'day'=> $this->input->post('day'),
			'night'=> $this->input->post('night'),
			'family'=> $this->input->post('family'),
			'date'=> date("Y-m-d"),
			'post_status'=> $this->input->post('post_status'),
			'package_status'=> $this->input->post('package_status'),
			'post_by'=>$this->session->userdata('email'),
			'origin'=>time().'.'.$ext,
			'thumbnail'=>time().'_thumb'.'.'.$ext
		);
		$this->db->where('id_package',$id);
		$this->db->update('package',$data);
	}else{
		$data = array(
			'package_category_id'=>$this->input->post('package_category_id'),
			'package_name'=>$this->input->post('package_name'),
			'sub_package_name'=>$this->input->post('sub_package_name'),
			'price'=>$this->input->post('price'),
			'slug'=>slug_url($this->input->post('package_name')),
			'promo'=>$this->input->post('promo'),
			'discount'=>$this->input->post('discount'),
			'star'=> 1 ,
			'description'=>$this->input->post('description'),
			'itinerary'=> $this->input->post('itinerary'),
			'reviews'=> $this->input->post('reviews'),
			'location'=> $this->input->post('latitude').','.$this->input->post('longitude'),
			'country'=> $this->input->post('country'),
			'province'=> $this->input->post('province'),
			'cities'=> $this->input->post('cities'),
			'pax'=> $this->input->post('pax'),
			'day'=> $this->input->post('day'),
			'night'=> $this->input->post('night'),
			'family'=> $this->input->post('family'),
			'date'=> date("Y-m-d"),
			'post_status'=> $this->input->post('post_status'),
			'package_status'=> $this->input->post('package_status'),
			'post_by'=>$this->session->userdata('email'),
			'origin'=>time().'.'.$ext,
			'thumbnail'=>time().'_thumb'.'.'.$ext
		);
		$this->db->where('id_package',$id);
		$this->db->update('package',$data);
	}
}



public function insert_photo_package(){

	$id = $this->input->post('id_package');
	$foto = $_FILES['foto']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/photo_package/thumbnail/'.time().'_thumb'.'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/photo_package/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		$uploadedImage = $this->upload->data();
        if($uploadedImage){
			$this->resizeImageGallery($uploadedImage['file_name']);
		}
		
		$data = array(
			'id_package'=>$id,
			'photo'=> $url,
			'origin'=>time().'.'.$ext,
			'thumbnail'=>time().'_thumb'.'.'.$ext,
			'date_publish'=>date('Y-m-d H:i:s')
		);
		$this->db->insert('photo_gallery',$data);
	}

}


public function delete_package($id)
{
		$data = $this->db->query("select * from photo_gallery where id_package = '".$id."'")->result_array();
		if(count($data) > 0){
			for($i=0;$i<count($data);$i++){
				unlink(realpath(APPPATH . '../assets/upload/photo_package/' . $data[$i]['origin']));
				unlink(realpath(APPPATH . '../assets/upload/photo_package/thumbnail/' . $data[$i]['thumbnail']));
			}
			$this->db->query("delete from photo_gallery where id_package = '".$id."'");
			$q = $this->db->query("select * from package where id_package = '".$id."'")->result_array();
				if(count($q) > 0){
					unlink(realpath(APPPATH . '../assets/upload/package/'.$q[0]['origin']));
					unlink(realpath(APPPATH . '../assets/upload/package/thumbnail/'.$q[0]['thumbnail']));
					return $this->db->query("delete from package where id_package = '".$id."'");
				}
			
		}else{
			$q = $this->db->query("select * from package where id_package = '".$id."'")->result_array();
			if(count($q) > 0){
				unlink(realpath(APPPATH . '../assets/upload/package/'.$q[0]['origin']));
				unlink(realpath(APPPATH . '../assets/upload/package/thumbnail/'.$q[0]['thumbnail']));
				return $this->db->query("delete from package where id_package = '".$id."'");
			}
		}

		
		

}

public function select_package($id)
{
	$sql = $this->db->query("select * from package where id_package = '".$id."'")->result_array();
	$row[] = array(
		"id_package" => $sql[0]['id_package'],
		"package_category_id" => $sql[0]['package_category_id'],
		"package_name" => $sql[0]['package_name'],
		"sub_package_name" => $sql[0]['sub_package_name'],
		"slug" => $sql[0]['slug'],
		"price" => $sql[0]['price'],
		"promo" => $sql[0]['promo'],
		"discount" => $sql[0]['discount'],
		"star" => $sql[0]['star'],
		"photo" => $sql[0]['photo'],
		"description" => $sql[0]['description'],
		"itinerary" => $sql[0]['itinerary'],
		"reviews" => $sql[0]['reviews'],
		"location" => $sql[0]['location'],
		'country'=> $sql[0]['country'],
		'province'=> $sql[0]['province'],
		"cities" => $this->convert_city($sql[0]['cities']),
		"pax" => $sql[0]['pax'],
		"day" => $sql[0]['day'],
		"night" => $sql[0]['night'],
		"family" => $sql[0]['family'],
		"date" => $sql[0]['date'],
		"post_status" => $sql[0]['post_status'],
		"package_status" => $sql[0]['package_status'],
		"post_by" => $sql[0]['post_by'],
		"origin" => $sql[0]['origin'],
		"thumbnail" => $sql[0]['thumbnail'],
	);
	return $row;
}


public function getallcities()
{
	$sql = $this->db->query("select * from cities")->result_array();
	return $sql;
}


public function getallphotopackage($id)
{
	$sql = $this->db->query("select * from photo_gallery where id_package = '".$id."' limit 6")->result_array();
	return $sql;
}


public function delete_gallery($idgallery,$origin,$thumbnail)
{
	if(file_exists(realpath(APPPATH . '../assets/upload/photo_package/'.$origin)) && file_exists(realpath(APPPATH . '../assets/upload/photo_package/thumbnail/'.$thumbnail))){
		unlink(realpath(APPPATH . '../assets/upload/photo_package/'.$origin));
		unlink(realpath(APPPATH . '../assets/upload/photo_package/thumbnail/'.$thumbnail));
		return $this->db->query("delete from photo_gallery where id_photo = '".$idgallery."'");
	}else{
		return $this->db->query("delete from photo_gallery where id_photo = '".$idgallery."'");
	}	
	
}


public function getallblog($limit,$start){

	$sql = $this->db->query("select * from blog limit ".$limit.", ".$start."")->result_array();
	return $sql;	
}

public function select_blog($id)
{
	$sql = $this->db->query("select * from blog where id_blog = '".$id."'")->result_array();
	return $sql;
}

public function total_blogs()
{
	$sql = $this->db->query("select * from blog")->num_rows();
	return $sql;

}



public function insert_blog(){

	$foto = $_FILES['photo']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/blog/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/blog/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('photo');
		
		if($this->upload->data()){
		
			$data = array(
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'photo'=>$url,
				'date'=>date("Y-m-d H:i:s")
			);
			$this->db->insert('blog',$data);
		}
	}

}


public function update_blog(){
	$id = $this->input->post('id_blog');
	$foto = $_FILES['photo']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/blog/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/blog/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('photo');
		
		if($this->upload->data()){
		
			$data = array(
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'photo'=>$url,
				'date'=>date("Y-m-d H:i:s")
			);
		}
	}else{

		$data = array(
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('description'),
			'date'=>date("Y-m-d H:i:s"),
		);
	}

		$this->db->where('id_blog',$id);
		$this->db->update('blog',$data);

}


public function delete_blog($id,$image){
	unlink(realpath(APPPATH.'../assets/upload/blog/'.$image));
	return $this->db->query("delete from blog where id_blog = '".$id."'");
}

public function getallcity($limit,$start){

	$data = $this->db->query("select * from cities limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($data);$i++){
		$row[] = array(
			"id_cities"=>$data[$i]['id_cities'],
			"id_province"=>$this->convert_province($data[$i]['id_province']),
			"cities_name"=>$data[$i]['cities_name']
		); 
	}
	return $row;
}

public function select_city($id)
{
	$sql = $this->db->query("select * from cities where id_cities = '".$id."'")->result_array();
	return $sql;
}

public function total_city()
{
	$sql = $this->db->query("select * from cities")->num_rows();
	return $sql;

}

public function insert_city(){

	$data = array(
		'id_province'=>$this->input->post('id_province'),
		'cities_name'=>$this->input->post('cities_name'),
	);
	$this->db->insert('cities',$data);
}


public function update_city(){
	$id = $this->input->post('id_cities');
	$data = array(
		'id_province'=>$this->input->post('id_province'),
		'cities_name'=>$this->input->post('cities_name'),
	);
	$this->db->where('id_cities',$id);
	$this->db->update('cities',$data);
}

public function delete_city($id){
	return $this->db->query("delete from cities where id_cities = '".$id."'");
}

public function getallcomments($limit,$start){
	$sql = $this->db->query("select * from comment limit ".$limit.", ".$start."")->result_array();
	return $sql;	
}


public function delete_comments($id){
	$sql = $this->db->query("delete from comment where id_comment = '".$id."'");
	return $sql;	
}

public function total_comments()
{
	$sql = $this->db->query("select * from comment")->num_rows();
	return $sql;

}

public function getallpackagecategory(){
	$sql = $this->db->query("select * from package_category")->result_array();
	return $sql;	
}

public function select_package_category($id){
	$sql = $this->db->query("select * from package_category where id_category = '".$id."'")->result_array();
	return $sql;	
}

public function insert_package_category(){

	$data = array(
		'name'=>$this->input->post('name'),
	);
	$this->db->insert('package_category',$data);
}


public function update_package_category(){
	$id = $this->input->post('id_category');
	$data = array(
		'name'=>$this->input->post('name'),
	);
	$this->db->where('id_category',$id);
	$this->db->update('package_category',$data);
}

public function delete_package_category($id){
	return $this->db->query("delete from package_category where id_category = '".$id."'");
}

public function getallsubscriber(){
	$sql = $this->db->query("select * from subscriber")->result_array();
	return $sql;	
}

public function delete_subscribers($id){
	$sql = $this->db->query("delete from subscriber where id_subscriber = '".$id."'");
	return $sql;	
}

public function getalltestimonial(){
	$sql = $this->db->query("select * from testimonial")->result_array();
	return $sql;	
}

public function select_testimonial($id){
	$sql = $this->db->query("select * from testimonial where id_testimonial = '".$id."'")->result_array();
	return $sql;	
}

public function insert_testimonials(){

	$foto = $_FILES['foto']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/testimonial/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/testimonial/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		
		if($this->upload->data()){
		
			$data = array(
				'name'=>$this->input->post('name'),
				'description'=>$this->input->post('description'),
				'foto'=>$url,
			);
			$this->db->insert('testimonial',$data);
		}
	}

}


public function update_testimonials(){
	$id = $this->input->post('id_testimonial');
	$foto = $_FILES['foto']['name'];
	if(!empty($foto)) {
		$ext = end(explode(".", $foto));
		$url = base_url('assets/upload/testimonial/'.time().'.'.$ext);
		$tujuan_file = realpath(APPPATH.'../assets/upload/testimonial/');
		$konfigurasi = array(
			'allowed_types'	=> 'jpg|jpeg',
			'upload_path'	=> $tujuan_file,
			'remove_spaces'	=> TRUE,
			'file_name' => time().'.'.$ext
		);

		$this->load->library('upload',$konfigurasi);
		$this->upload->do_upload('foto');
		
		if($this->upload->data()){
		
			$data = array(
				'name'=>$this->input->post('name'),
				'description'=>$this->input->post('description'),
				'foto'=>$url,
			);
			$this->db->where('id_testimonial',$id);
			$this->db->update('testimonial',$data);
		}
	}else{

		$data = array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
		);
		$this->db->where('id_testimonial',$id);
		$this->db->update('testimonial',$data);

	}

}

public function delete_testimonial($id,$image){
	unlink(realpath(APPPATH.'../assets/upload/testimonial/'.$image));
	return $this->db->query("delete from testimonial where id_testimonial = '".$id."'");
}


public function getallwishlist($limit,$start){
	$sql = $this->db->query("select * from package where star > '1' limit ".$limit.", ".$start."")->result_array();
	return $sql;	
}

public function gettotalwishlish(){
	$sql = $this->db->query("select * from package where star > '0'")->num_rows();
	return $sql;	
}


public function getallcountry($limit, $start){

	$sql = $this->db->query("select * from country limit ".$limit.", ".$start."")->result_array();
	return $sql;

}

public function total_country()
{
	$sql = $this->db->query("select * from country")->num_rows();
	return $sql;

}

public function select_country($id){
	return $this->db->query("select * from country where id_country = '".$id."'")->result_array();
}


public function insert_country(){

	$data = array(
		'name'=>$this->input->post('name'),
	);
	$this->db->insert('country',$data);
}


public function update_country(){
	$id = $this->input->post('id_country');
	$data = array(
		'name'=>$this->input->post('name'),
	);
	$this->db->where('id_country',$id);
	$this->db->update('country',$data);
}

public function delete_country($id){
	return $this->db->query("delete from country where id_country = '".$id."'");
}


public function getallprovince($limit, $start){

	$data = $this->db->query("select * from province limit ".$limit.", ".$start."")->result_array();
	$row = array();
	for($i=0;$i<count($data);$i++){
		$row[] = array(
			"id_province"=>$data[$i]['id_province'],
			"id_country"=>$this->convert_country($data[$i]['id_country']),
			"name"=>$data[$i]['name']
		); 
	}
	return $row;

}

public function total_province()
{
	$sql = $this->db->query("select * from province")->num_rows();
	return $sql;

}

public function select_province($id){
	return $this->db->query("select * from province where id_province = '".$id."'")->result_array();
}

public function listprovince(){

	$sql = $this->db->query("select * from province")->result_array();
	return $sql;

}

public function listcountry(){

	$sql = $this->db->query("select * from country")->result_array();
	return $sql;

}

public function insert_province(){

	$data = array(
		'id_country'=>$this->input->post('id_country'),
		'name'=>$this->input->post('name'),
	);
	$this->db->insert('province',$data);
}


public function update_province(){
	$id = $this->input->post('id_province');
	$data = array(
		'id_country'=>$this->input->post('id_country'),
		'name'=>$this->input->post('name'),
	);
	$this->db->where('id_province',$id);
	$this->db->update('province',$data);
}

public function delete_province($id){
	return $this->db->query("delete from province where id_province = '".$id."'");
}

public function listbooking(){
	$sql = $this->db->query("select * from customer")->result_array();
	return $sql;
}

public function delete_bookings($id){
	$sql = $this->db->query("delete from customer where id = '".$id."'");
	if($sql){
		return $this->db->query("delete from order_detail where id_cust = '".$id."'");
	}
}

public function approve_bookings($id){
	$sql = $this->db->query("update customer set approve = 'Y' where id = '".$id."'");
	return $sql;
}

public function detailbooking($id){
	$sql = $this->db->query("select * from order_detail where id_cust = '".$id."'")->result_array();
	return $sql;
}

public function resizeImage($filename)
   {
      $source_path = realpath(APPPATH . '../assets/upload/package/' . $filename);
      $target_path = realpath(APPPATH . '../assets/upload/package/thumbnail/');
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 300,
          'height' => 300
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
      $this->image_lib->clear();
   }

   public function resizeImageGallery($filename)
   {
      $source_path = realpath(APPPATH . '../assets/upload/photo_package/' . $filename);
      $target_path = realpath(APPPATH . '../assets/upload/photo_package/thumbnail/');
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 300,
          'height' => 300
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }
      $this->image_lib->clear();
   }



} 
?>