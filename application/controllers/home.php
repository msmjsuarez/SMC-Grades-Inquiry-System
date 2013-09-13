<?php
class Home extends CI_Controller {
	
	public function index() 
	{
		$data['content'] = 'index';
		$this->load->view('includes/template', $data);
	}
	
	public function about() 
	{
		$data['content'] = 'about';
		$this->load->view('includes/template', $data);
	}
	
	public function contact() 
	{
		$data['content'] = 'contact';
		$this->load->view('includes/template', $data);
	}
	
	public function login() 
	{
		$data['content'] = 'login';
		$this->load->view('includes/template', $data);
	}
	
	public function login_failed() 
	{
		$data['content'] = 'login_failed';
		$this->load->view('includes/template', $data);
	}
	
	/*public function signup() 
	{
		$data['content'] = 'signup';
		$this->load->view('includes/template', $data);
	}
	
	public function create_member()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judge_fname', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('judge_un', 'User Name', 'trim|required|is_unique[judge.judge_un]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
				
			if($this->form_validation->run() == FALSE)
			{
					$this->signup();
			}
			
			else
			{
					$this->load->model('home_model');
					if($query = $this->home_model->create_member()) 
					{	
						$data['content'] = 'signup_successful';
						$this->load->view('includes/template', $data);
		
					}
					else
					{	
						$this->load->view('signup_form');
					}
			}
	}*/
	
	public function validate_credentials() 
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('student_id', 'ID Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE) {
				$this->login(); 
			} 
			else { 
				$this->load->model('home_model');	
				$query = $this->home_model->validate('id');
			
					if($query == 1) {
						$data = array(
							//'email' => $this->input->post('email'),
							'student_id' => $this->input->post('student_id'),
							'is_logged_in' => true
						);
						
						$this->session->set_userdata($data);
						redirect('gradesinquiry/profile');
						
					}
					else {
						$this->login_failed();
					}
			}
		
		
		/*
		$this->load->model('home_model');	
		$query = $this->home_model->validate('id');
			
			if($query == 1) {
				$data = array(
					//'email' => $this->input->post('email'),
					'student_id' => $this->input->post('student_id'),
					'is_logged_in' => true
				);
				
				$this->session->set_userdata($data);
				redirect('gradesinquiry/profile');
				
			}
			else {
				$this->login();
			}*/
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
	
	
}