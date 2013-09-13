<?php
class Home_model extends CI_Model { 

	public function __construct() {
		parent::__construct();	
	}
	
	/*public function create_member() 
	{			
		$new_member_insert_data = array(
						'judge_fname' => $this->input->post('judge_fname'),
						'judge_un' => $this->input->post('judge_un'),
						'judge_pw' => $this->input->post('password')	
					);		
						
					$insert = $this->db->insert('judge', $new_member_insert_data);
					return $insert;
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
	}*/
	
	
	
	
	
	public function validate($id) 
	{
		//$this->db->where('email', $this->input->post('email'));
		$this->db->where('student_id', $this->input->post('student_id'));
		$query = $this->db->get('student');
												 
			$sql="SELECT * FROM student WHERE student_id='".$this->input->post('student_id')."'";
			$result=mysql_query($sql);
		
			// Mysql_num_row is counting table row
			$count=mysql_num_rows($result);
		
			while ($row = mysql_fetch_assoc($result)) 
				{
					$idnumber =$row['student_id'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
				 
				$passwordf = $idnumber.'-'.$first_name[0].'-'.$last_name[0];
				}
				
			mysql_free_result($result);
		
		
		
		//$this->db->where('password', md5($this->input->post('password')));
		
		
		if(($query->num_rows != 0) and ($this->input->post('password') == $passwordf)) {
			$id = 1;
			return $id;
		}
		
		/*if(($query->num_rows != 0)) {
			$id = 1;
			return $id;
		}*/
		
	}
	
	
			
}
?>