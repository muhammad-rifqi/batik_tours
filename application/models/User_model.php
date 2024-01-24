<?php

class User_model extends CI_Model {


	public function __construct()
	{
	parent::__construct();
	$this->load->helper(array('form', 'url','file'));
	$this->load->library('session');
	}


public function testimonial()
{
	$sql = $this->db->query("select * from testimonial")->result_array();
	return $sql;

}

public function blog()
{
	$sql = $this->db->query("select * from blog")->result_array();
	return $sql;

}

public function package()
{
	$sql = $this->db->query("select * from package where package_status = '1' and post_status = 'Publish'")->result_array();
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

public function detail_package($id)
{
	$sql = $this->db->query("select * from package where slug = '".$id."'")->result_array();
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

public function id_packages($id)
{
	$data = $this->db->query("select * from package where slug = '".$id."'")->result_array();
	return $data[0]['id_package'];
}

public function photo_package($id)
{
	$sql = $this->db->query("select * from photo_gallery where id_package = '".$id."'")->result_array();
	return $sql;

}

public function convert_city($id)
{
	$data = $this->db->query("select * from cities where id_cities = '".$id."'")->result_array();
	return $data[0]['cities_name'];
}


public function insert_carts(){

		$data2 = array(
			'id_package'=>$this->input->post('id_package'),
			'package_name'=>$this->input->post('package_name'),
			'price'=>$this->input->post('price'),
			'person'=> 1,
			'token'=> $this->input->post('token'),
			'id_cust'=>$this->db->insert_id(), 
			'foto'=>$this->input->post('foto'),
			'date'=>$this->input->post('date'),
			'destination'=>$this->input->post('destination')
		);
		$this->db->insert('cart',$data2);
}

public function insert_customers(){

	$data = array(
		'firstname'=>$this->input->post('firstname'),
		'lastname'=>$this->input->post('lastname'),
		'email'=>$this->input->post('email'),
		'phone'=>$this->input->post('phone'),
		'country'=>$this->input->post('country'),
		'province'=>$this->input->post('provinced'),
		'cities'=>$this->input->post('listcities'),
		'address'=>$this->input->post('address'),
		'postal_code'=>$this->input->post('postal_code'),
		'token' => $this->input->post('token')
	);
	$ins = $this->db->insert('customer',$data);
	if($ins){
		$id = $this->db->insert_id();
		$q = $this->db->query("select * from cart where token = '".session_id()."' ")->result_array();
		$j = count($q);
		for($i=0;$i<$j;$i++){
			$this->db->query("insert into order_detail(id_package,package_name,price,person,coupon,token,id_cust,foto,date,destination)values('".$q[$i]['id_package']."','".$q[$i]['package_name']."','".$q[$i]['price']."','".$q[$i]['person']."','".$q[$i]['coupon']."','".$q[$i]['token']."','".$id."','".$q[$i]['foto']."','".$q[$i]['date']."','".$q[$i]['destination']."')");
		}
	}

	return $this->db->query("delete from cart where token = '".session_id()."'");

}


public function detail_customers()
{
	$sql = $this->db->query("select * from customer where token = '".session_id()."'")->result_array();
	return $sql;
}

public function data_customers()
{
	$sql = $this->db->query("select * from order_detail where token = '".session_id()."'")->result_array();
	return $sql;
}

public function getallcart()
{
	$sql = $this->db->query("select * from cart where token = '".session_id()."'")->result_array();
	return $sql;
}

public function delete_carts($id)
{
	$sql = $this->db->query("delete from cart where id = '".$id."'");
	return $sql;
}

public function getallcountry()
{
	$sql = $this->db->query("select * from country ")->result_array();
	return $sql;
}

public function getallcities($id)
{
	$sql = $this->db->query("select * from cities where id_province = '".$id."'")->result_array();
	return $sql;
}

public function getallprovince($id)
{
	$sql = $this->db->query("select * from province where id_country = '".$id."' ")->result_array();
	return $sql;
}



public function insert_comments(){

	$data = array(
		'name'=>$this->input->post('name'),
		'email'=>$this->input->post('email'),
		'description'=>$this->input->post('description'),
		'date'=>date("Y-m-d H:i:s"),
		'id_package'=>$this->input->post('id_package')
	);
	$this->db->insert('comment',$data);

}


public function getallcomment($id)
{
	$sql = $this->db->query("select * from comment where id_package = '".$id."' ")->result_array();
	return $sql;
}

public function domestics()
{
	$sql = $this->db->query("select * from package where package_category_id = '1' and package_status = '1' and post_status = 'Publish'")->result_array();
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


public function internationals()
{
	$sql = $this->db->query("select * from package where package_category_id = '2' and package_status = '1' and post_status = 'Publish'")->result_array();
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


public function update_quantitys(){
	$id = $this->input->post('id');
	$q = $this->input->post('quantity');
	for($i=0;$i<count($id);$i++){
		$this->db->query("update cart set person = '".$q[$i]."' where id = '".$id[$i]."'");
	}
}

public function insert_subscribers(){

	$data = array(
		'email'=>$this->input->post('email'),
	);
	$this->db->insert('subscriber',$data);
}


public function searchs()
{	
	$post = $this->input->post('cari');
	$sql = $this->db->query("select * from package where package_name LIKE '%".$post."%' ")->result_array();
	return $sql;
}

public function invoices($id)
{
	$sql = $this->db->query("select * from customer where id = '".$id."' ")->result_array();
	$row = array();
	for($i=0;$i<count($sql);$i++){
		$row[] = array(
			"id" => $sql[$i]['id'],
			"firstname" => $sql[$i]['firstname'],
			"lastname" => $sql[$i]['lastname'],
			"email" => $sql[$i]['email'],
			"phone" => $sql[$i]['phone'],
			"address" => $sql[$i]['address'],
			"postal_code" => $sql[$i]['postal_code'],
			"orders"=>$this->db->query("select * from order_detail where id_cust = '".$sql[$i]['id']."'")->result_array(),
			"status"=>"ok"
		);
	}
	return $row;
}

public function add_wishlists($id)
{	
	$sql = $this->db->query("update package set star=star+1 where  id_package = '".$id."'");
	return $sql;
}

} ?>
