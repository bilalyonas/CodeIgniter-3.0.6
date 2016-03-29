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
	
	 
    public function Members () {
        $this->load->view('Members');
    }
    
	
	public function login_validation() {
		
		$this->load->library('form_validation') ;
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials'); 
        $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		  
    if ($this->form_validation->run()){
		$data + array (
			'email' => $this->input->post('email'),
			'is_logged_in' => 1 
		) ; 
		
		$this->session->set_uderdata($data) ; 
        redirect('main/Members'); 
    } else {
        $this->load->view('login');
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
	
	
	
}
