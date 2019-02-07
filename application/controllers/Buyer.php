<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Buyer extends CI_Controller{

		public function index(){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 4)))
			{
				redirect('users/login');
			}

			$data['title'] = 'This is Buyer page';
			$data['products'] = $this->Crop_model->get_all_products_info();
			//echo "<pre>";
			//print_r($data['products']);
			//exit();
			$this->load->view('templates/header');
			$this->load->view('buyer/buyer',$data);
			$this->load->view('templates/footer');
		}

		//place an order
		public function placeOrder($Product_id){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 4)))
			{
				redirect('users/login');
			}
			$u_id = $this->session->userdata('u_id');

			$data['id'] = $Product_id;
			$data['title'] = "orders of buyer";
			$data['products'] = $this->Crop_model->get_buyer_products_info($Product_id);
			//echo $u_id;
			//exit();

			$this->form_validation->set_rules('quantity','Quantity','required');
			$this->form_validation->set_rules('fullname','Name','required');
			$this->form_validation->set_rules('contact','Contact','required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('l_add','Local Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('pincode','Pincode','required');
			$this->form_validation->set_rules('mode','Payment Mode','required');

			if($this->form_validation->run() === FALSE)
			{

				$this->load->view('templates/header');
				$this->load->view('buyer/placeOrder',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				$data['check'] = $this->Crop_model->addProductOrder($Product_id,$u_id);
				$this->session->set_flashdata('product_ordered','Product Ordered successfully');
				
				redirect('buyer/myOrders');
			}		
		}

		//check if quantity
		public function check_quantity_exists($quantity,$Product_id){
			$this->form_validation->set_message('check_quantity_exists','Quantity availabilty is low');
			$data['check'] = $this->Crop_model->check_quantity_exists($quantity,$Product_id);
			print_r($data['check']);
			exit();
			if($this->Crop_model->check_quantity_exists($quantity,$Product_id)){
				return true;
			}
			else{
				return false;
			}
		}

		//to get the orders made by particular user
		public function myOrders(){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 4)))
			{
				redirect('users/login');
			}

			$u_id = $this->session->userdata('u_id');
			
			$data['orders'] = $this->Crop_model->Orders_of_buyer($u_id);
			//echo "<pre>"
			//print_r($data['orders']);
			//exit();
			
			$this->load->view('templates/header');
			$this->load->view('buyer/myOrders',$data);
			$this->load->view('templates/footer');
		}
		
	}