<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Sign Up</h1>
    
    <?php
    
    echo form_open('main/signup_validation') ;
    
    echo "<p>Email: ";
    echo form_input('email'); 
    echo "</p>";
    
    echo "<p>Password: ";
    echo form_password('password'); 
    echo "</p>";
    
    echo "<p>Confirm Password: ";
    echo form_password('cpassword'); 
    echo "</p>";
    
    echo "<p>";
    echo form_submit('signup_submit','Sign up' ); 
    echo "</p>";
    
    echo form_close(); 
    
    
    ?>
	
 

</div>

</body>
</html>