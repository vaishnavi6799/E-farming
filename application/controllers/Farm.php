<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farm extends CI_Controller {

	public function index()
	{
		
		$this->load->view('farm/home');
		$this->load->view('templates/footer');
	}
}
