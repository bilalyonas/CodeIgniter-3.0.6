<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	// View login page on startup
	public function index()
	{
		$this->login(); 
	}

	//Load login page
	public function login()
	{
		$this->load->view('login');
	}
	
	//Load signup page
	
	public function signup (){
		
		$this->load->view('signup');
	 
	}
	
	//Load update page
		public function update (){
		
		$this->load->view('update');
	 
	}
	
	//Load input page
	
	public function input (){
		
		$this->load->view('input');
	 
	}
	
	//Only view members page if user is logged in
	
    public function Members () {
		if ($this->session->userdata('is_logged_in')) {
		$this->load->view('members'); 
		
		} else {
			redirect('main/restricted') ; 
		}
		
 }
 
 // Restricted page
    public function restricted () {
		$this->load->view('restricted');
	}
    
// Validation for User Login	
	public function login_validation() {
		
		$this->load->library('form_validation') ;
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials'); 
        $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		  
    if ($this->form_validation->run()){
		$data = array (
			'email' => $this->input->post('email'),
			'is_logged_in' => 1 
		); 
		// If login successfull Redirect to members page
		$this->session->set_userdata($data) ; 
        redirect('main/Members'); 
    } else {
        $this->load->view('login');
        }
		
		
	}
	// Signup validation
	public function signup_validation(){
		
		$this->load->library('form_validation');
		$this->load->model('model_users') ;
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
		
		$this->form_validation->set_message('is_unique', "Sorry this email address already exists") ;
		// if validation runs send an email to user
		if ($this->form_validation->run()){
			
			$key =md5(uniqid());
			
			$this->load->library('email', array('mailtype'=>'html'));
			// Link in email for users to confirm account
			$this->email->from('u1258434@unimail.hud.ac.uk', "bilal");
			$this->email->to($this->input->post('email'));				   
			$this->email->subject("confirm the account.");
			
			$message = "<p> Signup is successfull<p>" ;
			$message = "<p><a href='http://localhost/CodeIgniter-3.0.6/index.php/main/register_user/$key' >Click here</a>
			To confirm the account</p>"; 
			
			$this->email->message($message);
			
			
			if ($this->model_users->add_temp_user($key)) {
			if ($this->email->send()){
				echo "Email has been sent" ; 
				} else echo "Email was not sent.";
				
			} else echo "Problem with adding to database"; 
				
				
				
				
		} else {
			
			$this->load->view('signup'); 
		}
	}
	
	
		// function to validate credentials when user is trying to log in
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
	
	//function when user logs out
	public function logout() {
		$this->session->sess_destroy();
		redirect('main/login'); 
	}
	
	// register user function with each user getting a unique key which unless matches wont allow registration
	
	public function register_user($key){
	$this->load->model ('model_users') ; 
	
	if ($this->model_users->is_key_valid($key)){
	if ($newemail = $this->model_users->add_user($key)){
		
		$data = array(
		'email' => $newemail, 
		'is_logged_in' => 1
		
		); 
		
		$this->session->set_userdata($data) ; 
		redirect ('main/members') ; 
	} else echo "failed to add user" ; 
	
	
	} else echo "invalid key" ; 
	

}
 //Add details funcion
public function upload_validation()
{
$data['title']="upload Validation";
$this->load->library('form_validation');

$this->form_validation->set_rules('make', 'make', 'required|trim');
$this->form_validation->set_rules('model', 'model', 'required|trim');
$this->form_validation->set_rules('colour', 'colour', 'required|trim');
$this->form_validation->set_rules('paintcode', 'paintcode', 'required|trim');
$this->form_validation->set_rules('year', 'year', 'required|trim');




if ($this->form_validation->run() ==FALSE)
{
echo "";
$this->load->view('input', $data);
}else
{
$this->load->model('model_users');
$result = $this->model_users->insert_car();
if ($result)
{
redirect('main/members', $data);
}else
{
echo "ooopps";
}  
}
}

// function for displaying data in database 
public function display (){
	
	$this->load->helper('form');
	$this->load->model('model_users', 'cars');
	$cars = $this->cars->display_all_data();
	$this->load->view('display', compact('cars'));
	
}

// show full details once user chooses a car
public function car_details ($carid){
	$this->load->helper('form');
	$this->load->model('model_users', 'cars');
	$car = $this->cars->fetch_all_data($carid);
	$this->load->view('car_detail', compact('car'));
	
}

// Edit data from database
public function edit ($carid){
	$this->load->helper('form');
	$this->load->model('model_users', 'cars');
	$car = $this->cars->fetch_all_data($carid);
	$this->load->view('update', compact('car'));
	
}


 public function update_car()
   {
	
		$carid = $this->input->post('carid');
		$Cars = array(
		'make' => $this->input->post('make'),
		'model' => $this->input->post('model'),
		'colour' => $this->input->post('colour'),
		'paintcode' => $this->input->post('paintcode'),
		'year' => $this->input->post('year')
		);
		
		$this->load->model('model_users');
		$this->model_users->car_update($Cars,$carid);
		echo '<script>alert("Car Updated");</script>';
		redirect('Main/members', 'refresh');
   }

   // Delete data from database
 public function delete()
    {
		$this->load->model('model_users');
		$this->model_users->delete_car();
		echo '<script>alert("Removed Successfully");</script>';
		redirect('main/members', 'refresh');
    }

	// export chosen data in csv format
 public function export( $carid ){

      


        $file_name = 'carDetail_'.date("Y-m-d").'.csv';
		
        $query = $this->db->query("SELECT 

                make as 'make',
				model as 'model',
				colour as 'colour',
				paintcode as 'paintcode',
				year as 'year'
			      
                FROM cars
                WHERE `carid`='{$carid}'
                "); 
        $this->load->dbutil();
        $data = $this->dbutil->csv_from_result($query);
        $this->load->helper('download');
        force_download($file_name, $data); 
        exit();
    }
	
}

