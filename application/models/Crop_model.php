<?php
	class Crop_model extends CI_Model{

		//crop added by sellers to know about them
		public function addCrop($u_id){


			$data = array(
				'name' => $this->input->post('name'),
				'user_id' => $u_id
			);

			return $this->db->insert('crop', $data);
		}

		//add crop for sale
		public function addCropforSale($u_id,$crop_image){
			$data = array(
				'seller_id' => $u_id,
				'crop_id' => $this->input->post('crop_id'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price'),
				'product_desc' => $this->input->post('product_desc'),
				'crop_image' => $crop_image
			);
			return $this->db->insert('product', $data);
		}

		//place order
		public function addProductOrder($Product_id,$u_id){
			//when buyer enters the details of the order
			$data = array(
				'buyer_id' => $u_id,
				'Product_id' => $Product_id,
				'quantity_selected' => $this->input->post('quantity'),
				'fullname' => $this->input->post('fullname'),
				'state' => $this->input->post('state'),
				'country' => $this->input->post('country'),
				'Local_add' => $this->input->post('l_add'),
				'pincode' => $this->input->post('pincode'),
				'contact' => $this->input->post('contact'),
				'mode' => $this->input->post('mode')
			);		
			$this->db->insert('placeorder', $data);
			$x = $this->input->post('mode');			
			if($x)
			{
				$data2 = array(
				'buyer_id' => $u_id,				
				'Product_id' => $Product_id,
				'cardname' => $this->input->post('cardname'),
				'cardnumber' => $this->input->post('cardnumber'),
				'expmonth' => $this->input->post('expmonth'),
				'expyear' => $this->input->post('expyear'),
				'cvv' => $this->input->post('cvv')
			);
				$this->db->insert('payment', $data2);
			}
			//we need to update the product table
			if($this->input->post('quantity'))
			{
				 $y = $this->input->post('quantity');
				 $this->db->select('sum(quantity_selected) as qs');
				 $this->db->from('product');
				 $this->db->join('placeorder','placeorder.product_id = product.product_id');
				 $this->db->group_by('placeorder.product_id');
				 $this->db->having('product_id',$Product_id);
				// $query = $this->db->get();
				 $qs =  $this->db->get()->row()->qs;
				 $data = array('quantity_selected_by_all_users' => $qs);
				 $where = "product.product_id = $Product_id ";
				 $str = $this->db->update('product', $data, $where);
			}		
			return $qs;
		}

		//list of crops added by all the users
		public function get_all_crops(){
			//$this->db->
			$query = $this->db->get('crop');
			return $query->result_array();
		}

		//get list of crops added by the particular user
		public function get_crops_info($u_id){
			//$this->db->
			$query = $this->db->get_where('crop',array('user_id' => $u_id));
			return $query->result_array();
		}

		//get all crops list whose info is described
		public function get_list_crops_info(){
			$this->db->join('process1','crop.id = process1.crop_id','left_outer');
			$this->db->join('info','process1.p_id = info.process1_id');
			//$this->db->join('fertilizers','process_fer.fer_id = fertilizers.id');
			$query = $this->db->get('crop');
			return $query->result_array();
		}

        //given a crop where ao describes about it
		public function get_list_of_crops_info_k(){
			$this->db->join('info','info.process1_id = process1.p_id');
			$this->db->join('process1','process1.crop_id = crop.id ');
			$this->db->join('users','users.id = process1.ao_id');
			$query = $this->db->get();
			return $query->result_array();
		}

		//get all fer list whose info is described
		public function get_list_jkfer(){
			$this->db->select('pf.*,p.soil,p.climate,c.name,GROUP_CONCAT(pc.pest_name) AS all_pests,GROUP_CONCAT(f.fer_name) AS all_fers');
			$this->db->distinct();
			$this->db->from('process_fer pf');
			$this->db->join('fertilizers f','f.id = pf.fer_id','inner');
			$this->db->join('crop c','c.id = pf.crop_id','inner');
			$this->db->join('process p','p.crop_id = pf.crop_id','inner');			
			$this->db->join('process_pest pp','p.crop_id = pp.crop_id','inner');					
			$this->db->join('pesticides pc','pp.pest_id = pc.id','inner');			
			$this->db->group_by('pf.crop_id');
			
			$query = $this->db->get();
			return $query->result_array();
		}

		

		//get fertilizers selected for each crop
		public function get_list_fer(){
/*
*/
			$this->db->select('pf.*,p.soil,p.climate,c.name,GROUP_CONCAT(f.fer_name) AS all_fers');
			$this->db->from('process_fer pf');
			$this->db->join('fertilizers f','f.id = pf.fer_id','inner');
			$this->db->join('crop c','c.id = pf.crop_id','inner');
			$this->db->join('process p','p.crop_id = pf.crop_id','inner');
			//$this->db->join('')
			$this->db->group_by('pf.crop_id');
			
			$query = $this->db->get();
			return $query->result_array();
		}

		//get all crops list whose info is not described		
		public function get_list_crops_no_info(){
			$this->db->select('crop.*, process1.*');
			$this->db->from('crop');
			$this->db->join('process1', 'process1.crop_id = crop.id', 'left');
			$this->db->where('process1.crop_id',NULL);
			$query = $this->db->get();

			return $query->result_array();
		}


		//get products of particuler user
		public function get_products_info($u_id){
			$this->db->join('product','product.crop_id = crop.id');
			$this->db->where('seller_id', $u_id);
			$query = $this->db->get('crop');
			return $query->result_array();
		}

		//get all products
		public function get_all_products_info(){
			$this->db->join('product','product.crop_id = crop.id');
			$this->db->join('users','users.id = crop.user_id');
			$query = $this->db->get('crop');
			return $query->result_array();
		}

		//get product which is ordered by the buyer
		public function get_buyer_products_info($Product_id){
			$this->db->join('product','product.crop_id = crop.id');

			$this->db->join('users','users.id = crop.user_id');
			$this->db->where('product.product_id',$Product_id);
			$query = $this->db->get('crop');
			return $query->result_array();
		}

		//get orders of buyer
		public function Orders_of_buyer($u_id){
			$this->db->join('users','users.id = placeorder.buyer_id');
			$this->db->join('product','product.product_id = placeorder.product_id');
			$this->db->join('crop','crop.id = product.crop_id');
			$this->db->where('placeorder.buyer_id',$u_id);
			$query = $this->db->get('placeorder');
			return $query->result_array();
		}

		//check quantity available
		public function check_quantity_exists($quantity,$Product_id){
			echo $Product_id;
			echo "string";
			$query = $this->db->get_where('product',array('product_id' => $Product_id));
			return $query->result_array();
			/*$q = $this->db->get()->row()->quantity;
			$qs =  $this->db->get()->row()->qs;
			echo $q-$qs;
			exit();
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}*/
		}

	}