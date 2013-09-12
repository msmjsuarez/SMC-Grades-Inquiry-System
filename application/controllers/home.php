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
	
}