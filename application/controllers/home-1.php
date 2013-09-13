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
	
	public function validate_credentials() 
	{
		$this->load->model('gradesinquiry_model');	
		$query = $this->gradesinquiry_model->validate('id');
			
			if($query == 1) {
				$data = array(
					'email' => $this->input->post('email'),
					'is_logged_in' => true
				);
				
				$this->session->set_userdata($data);
				redirect('gradesinquiry/profile');
			}
			else {
				$this->login();
			}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->login();
	}

}
?>	