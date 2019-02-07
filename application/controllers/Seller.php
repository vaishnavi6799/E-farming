<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Seller extends CI_Controller{

		public function index($u_id){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 3)))
			{
				redirect('users/login');
			}

			$data['title'] = 'This is seller page';
			$data['id'] = $u_id;
			$data['sellers'] = $this->User_model->get_sellers();
			$data['allcrops'] = $this->Crop_model->get_all_crops();
			$data['crops'] = $this->Crop_model->get_crops_info($u_id);
			$data['products'] = $this->Crop_model->get_products_info($u_id);

			//echo "<pre>";
			//print_r($data['products']);
			//exit();

			$this->form_validation->set_rules('name','CROP NAME','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('seller/seller',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->Crop_model->addCrop($u_id);
				$this->session->set_flashdata('crop_added','Crop added successfully');
				//echo $u_id;
				//exit();
				redirect('seller/index/'.$u_id);
			}			
		}
		public function cropInfo($u_id){

					if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 3)))
					{
						redirect('users/login');
					}

					$data['title'] = 'This is seller page';
					$data['id'] = $u_id;
					$data['sellers'] = $this->User_model->get_sellers();
					$data['allcrops'] = $this->Crop_model->get_all_crops();
					$data['crops'] = $this->Crop_model->get_crops_info($u_id);
					//$data['products'] = $this->Crop_model->get_products_info($u_id);

					//echo "<pre>";
					//print_r($data['products']);
					//exit();

					$this->form_validation->set_rules('name','CROP NAME','required');
					if($this->form_validation->run() === FALSE)
					{
						$this->load->view('templates/header');
						$this->load->view('seller/cropInfo',$data);
						$this->load->view('templates/footer');
					}
					else
					{
						$this->Crop_model->addCrop($u_id);
						$this->session->set_flashdata('crop_added','Crop added successfully');
						//echo $u_id;
						//exit();
						redirect('seller/index/'.$u_id);
					}			
				}

		public function sale($u_id){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 3)))
			{
				redirect('users/login');
			}

			$data['title'] = 'This is seller page';
			$data['id'] = $u_id;
			$data['sellers'] = $this->User_model->get_sellers();
			$data['allcrops'] = $this->Crop_model->get_all_crops();
			$data['crops'] = $this->Crop_model->get_crops_info($u_id);
			
			$data['products'] = $this->Crop_model->get_products_info($u_id);
			echo $u_id;
			//print_r($data['sellers']);
			//exit();

			$this->form_validation->set_rules('quantity','Quantity','required');
			$this->form_validation->set_rules('price','Price','required');
			$this->form_validation->set_rules('crop_id','Crop','required');
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('seller/seller',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				//upload image
				$config['upload_path'] = './assets/images/crops';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors = array('error' => $this->upload->display_errors());
					$crop_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$crop_image = $_FILES['userfile']['name'];
				}

				$this->Crop_model->addCropforSale($u_id,$crop_image);
				$this->session->set_flashdata('crop_for_sale','Crop for sale added successfully');
				//echo $u_id;
				//exit();
				redirect('seller/sale/'.$u_id);
			}			
		}
	}