<?php
class Gradesinquiry_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	
	
	
	
	public function student_details()
	{
		//$query = $this->db->get_where('student', array('student.email' => $_SESSION['email']));
		//$query = $this->db->get_where('student, department', array('student.student_id' => $_SESSION['student_id'], 'student.department_id' => 'department.department_id'));
		
		$SqlInfo = "SELECT * FROM student, department where department.department_id = student.department_id and student.student_id = '".$_SESSION['student_id']."'";
		$query = $this->db->query($SqlInfo);
		return $query->result();
				
				
	}
	
	
	
	
	
	
	
}
?>