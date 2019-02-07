<?php
	class Process_model extends CI_Model{

		public function process($id){
			
			$data = array(
				'crop_id' => $id,
				'soil' => $this->input->post('soil'),
				'climate' => $this->input->post('climate'),
				'fertilizer' => $this->input->post('fertilizer'),
				'pesticide' => $this->input->post('pesticide'),
				'new_tech' => $this->input->post('new_tech')

			);

			return $this->db->insert('process',$data);
		}
/*
		public function process1($id,$ao_id){
			$query = $this->db->get_where('process1',array('crop_id' => $id, 'ao_id' => $ao_id));
			if(empty($query->row_array())){
				$data = array(
				'crop_id' => $id,
				'ao_id' => $ao_id
			);
			$this->db->insert('process1',$data);
			}
			
			$query = $this->db->get_where('process1',array('crop_id' => $id, 'ao_id' => $ao_id));
			$x = $query->row(0)->id;
			$data = array(
				'process1_id' => $x,
				'text' => $this->input->post('text')
			);

			return $this->db->insert('info',$data);
		}*/

		//multiselect fertilizers
		public function process_fer($id){

			$foods = $this->input->post('fer_name');			
		    $data = array();
		    foreach( $foods as $k => $v){
		      $data[$k]['crop_id']=$id;
		      $data[$k]['fer_id']=$v;
		    }	   

			return $this->db->insert_batch('process_fer',$data);
		}

		//multiselect pescticides
		public function process_pest($id){

			$foods = $this->input->post('pest_name');			
		    $data = array();
		    foreach( $foods as $k => $v){
		      $data[$k]['crop_id']=$id;
		      $data[$k]['pest_id']=$v;
		    }	   

			return $this->db->insert_batch('process_pest',$data);
		}

		//get list of fertilizers
		public function fertilizers(){
			$query = $this->db->get('fertilizers');
			return $query->result_array();
		}

		//get list of pesticides
		public function pesticides(){
			$query = $this->db->get('pesticides');
			return $query->result_array();
		}
	}