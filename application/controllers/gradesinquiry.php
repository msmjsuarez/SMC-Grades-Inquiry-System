<?php
class Gradesinquiry extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	
	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		//$email = $this->session->userdata('email');
		//$_SESSION['email'] = $email;
		
		$student_id = $this->session->userdata('student_id');
		$_SESSION['student_id'] = $student_id;
		
		if(!isset($is_logged_in) || $is_logged_in != true )
		{
			echo 'You don\'t have permission to access this page. <a href="../">Login</a>';
			die();
		}
	}
	
	public function profile() 
	{
		$this->load->model('gradesinquiry_model');
		$data['query'] = $this->gradesinquiry_model->student_details();
		
		$data['content'] = 'profile';
		$this->load->view('includes/template_member', $data);
	}
	
	public function search_grade_sm_sy() 
	{
		$this->load->model('gradesinquiry_model');
		$data['query'] = $this->gradesinquiry_model->student_details();
		
		$data['content'] = 'search_grade_sm_sy';
		$this->load->view('includes/template_member_search', $data);
	}
	
	
}
?>