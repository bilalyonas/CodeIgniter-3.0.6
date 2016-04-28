<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>
	
<link href="<?php echo base_url()."css/style.css";?>" rel="stylesheet" type="text/css">

	   <div id="outerwrapper">
	
	
	<div id="innerwrapper">
	
	
	
</body>
<?php include('navigation.html');?>

  <img id="img" src="<?php echo base_url('images/banner.jpg'); ?>" />


<div id="container">
	<h1>Login</h1>
	
 <div id="forms">
    <?php
    
    echo form_open('Main/login_validation');
    // view validation errors if system picks up any
    echo validation_errors();
    
    // Login form 
    echo "<p>Email: ";
    echo form_input('email', $this->input->post('email')); 
    echo "</p>"; 
    
     echo "<p>Password: ";
    echo form_password('password');
    echo "</p>";
    
     echo "<p>";
    echo form_submit('login_submit','Login'); 
    echo "</p>"; 
    
    echo form_close(); 
    
    ?>
 </div>

</div>
	</div>
	   </div>

</body>
</html>