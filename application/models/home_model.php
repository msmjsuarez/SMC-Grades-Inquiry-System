<?php
class Home_model extends CI_Model { 

	public function __construct() {
		parent::__construct();	
	}
	
	public function validate($id) 
	{
		$this->db->where('judge_un', $this->input->post('judge_un'));
		$this->db->where('judge_pw', $this->input->post('password'));
		$query = $this->db->get('judge');
		
		if($query->num_rows != 0) {
			$id = 1;
			return $id;
		}
	}
	
	
			
}
?>