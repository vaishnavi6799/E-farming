<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller{

		//list of all sellers, buyers and agri_officers registered
		public function index()
		{
			if(!($this->session->userdata('logged_in') and ($this->session->userdata('user_id') == 1)))
			{
				redirect('users/login');
			}

			$data['title'] = 'THIS IS ADMIN PAGE';
			$data['sellers'] = $this->User_model->get_sellers();
			$data['buyers'] = $this->User_model->get_buyers();
			$data['a_offs'] = $this->User_model->get_a_offs();

			$this->load->view('templates/header');
			$this->load->view('admin/admin',$data);
			$this->load->view('templates/footer');
		} 
	}