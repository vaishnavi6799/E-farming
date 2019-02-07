<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class A_off extends CI_Controller{

		public function index(){

			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 2)))
			{
				redirect('users/login');
			}

			$data['title'] = 'This is Agricultural Officer Page';
			$data['crops'] = $this->Crop_model->get_list_crops_no_info();//whose info is not available
			$data['cropsInfo'] = $this->Crop_model->get_list_crops_info();//whose info is available
			//$data['ferlists'] = $this->Crop_model->get_list_fer();//whose info is available
		//	$data['cropsAO'] = $this->Crop_model->get_list_of_crops_info();//given a crop ao describes about it
	//		echo "<pre>";
	//		print_r($data['crops']);
		
	//exit();
			$this->load->view('templates/header');
			$this->load->view('a_off/a_off',$data);
			$this->load->view('templates/footer');
		}

		public function process1($id){
			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 2)))
			{
				redirect('users/login');
			}

			$ao_id = $this->session->userdata('u_id');
			$data['title'] = "process";
			$data['key'] = $id;
			$data['crops'] = $this->Crop_model->get_list_crops_no_info();//whose info is not available
			$data['cropsInfo'] = $this->Crop_model->get_list_crops_info();//whose info is available		//

			$this->form_validation->set_rules('text','text','required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('a_off/process1',$data);
				$this->load->view('templates/footer');
			}
			else{				
				$this->Process_model->process1($id,$ao_id);
				$this->session->set_flashdata('process_added','process added successfully');
				redirect('a_off');
			}
		}

		public function process($id){
			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 2)))
			{
				redirect('users/login');
			}

			$data['title'] = "process";
			$data['key'] = $id;
			$data['fertilizers'] = $this->Process_model->fertilizers();			
			$data['pesticides'] = $this->Process_model->pesticides();
			//print_r($data['fertilizers']);
			//exit();
			$this->form_validation->set_rules('soil','soil','required');
			$this->form_validation->set_rules('climate','climate','required');
			$this->form_validation->set_rules('fertilizer','fertilizer','required');
			$this->form_validation->set_rules('pesticide','pesticide','required');
			$this->form_validation->set_rules('new_tech','new technologies','required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('a_off/process',$data);
				$this->load->view('templates/footer');
			}
			else{				
				$this->Process_model->process($id);			
				//$this->Process_model->process_fer($id);					
				//$this->Process_model->process_pest($id);
				$this->session->set_flashdata('process_added','process added successfully');
				redirect('a_off');
			}
		}
	}