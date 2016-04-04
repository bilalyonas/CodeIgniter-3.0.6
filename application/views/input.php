<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Input details</h1>
	
 
    <?php
    
  	echo form_open('main/upload_validation');
	
	
	echo validation_errors();
	
	echo"<p>make: ";
	echo form_input('make', $this->input->post('make')) ;
	echo "</p>";
	
	echo"<p>model: ";
	echo form_input('model', $this->input->post('model')) ;
	echo "</p>";
	
	echo"<p>colour: ";
	echo form_input('colour', $this->input->post('colour')) ;
	echo "</p>";
	
	echo"<p>paint_code: ";
	echo form_input('paintcode', $this->input->post('paintcode')) ;
	echo "</p>";
	
	echo"<p>year: ";
	echo form_input('year', $this->input->post('year')) ;
	echo "</p>";

	
	echo"<p>";
	echo form_submit('upload_submit', 'Upload');
	echo "</p>";
	
	echo form_close();
	 ?>
    
   
	
	<a href='<?php echo base_url()."index.php/main/signup"; ?>'>Sign Up</a>

</div>

</body>
</html>