<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{
		$this->login(); 
	}

	public function login()
	{
		$this->load->view('login');
	}
	
	public function signup (){
		
		$this->load->view('signup');
	 
	}
    public function Members () {
		if ($this->session->userdata('is_logged_in')) {
		$this->load->view('members'); 
		
		} else {
			redirect('index.php/main/restricted') ; 
		}
		
 }
 
 
    public function restricted () {
		$this->load->view('restricted');
	}
    
	
	public function login_validation() {
		
		$this->load->library('form_validation') ;
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials'); 
        $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		  
    if ($this->form_validation->run()){
		$data = array (
			'email' => $this->input->post('email'),
			'is_logged_in' => 1 
		); 
		
		$this->session->set_userdata($data) ; 
        redirect('main/Members'); 
    } else {
        $this->load->view('login');
        }
		
		
	}
	
	public function signup_validation(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		
		if ($this->form_validation->run()){
			echo "pass";
		} else {
			echo "error you cant signup:" ; 
		}
	}
	
	
		
		public function validate_credentials () {
			$this->load->model('Model_users');
			
			if ($this->Model_users->can_log_in()){
				return true;
			
			} else {
				$this->form_validation->set_message('validate_credentials', 'Incorrect
													username/password.');
				return false; 
			}	
	
		
		
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('main/login'); 
	}
	
	
	
}
