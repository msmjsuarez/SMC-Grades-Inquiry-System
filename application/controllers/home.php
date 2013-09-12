<?php
class Home extends CI_Controller {
	
	public function index() 
	{
		$data['content'] = 'index';
		$this->load->view('includes/template', $data);
	}
	
	public function contact() 
	{
		$data['content'] = 'contact';
		$this->load->view('includes/template', $data);
	}
	
	public function about() 
	{
		$data['content'] = 'about';
		$this->load->view('includes/template', $data);
	}
	
	public function login() 
	{
		$data['content'] = 'login';
		$this->load->view('includes/template', $data);
	}
	
	public function validate_credentials() 
	{
		$this->load->model('home_model');	
		$query = $this->home_model->validate('id');
			
			if($query == 1) {
				$data = array(
					'judge_un' => $this->input->post('judge_un'),
					'is_logged_in' => true
				);
				
				$this->session->set_userdata($data);
				redirect('scoreboard/members_area');
				
			}
			else {
				$this->index();
			}
	}
	
}