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
	   <div id="logindetail"> 
	   <?php
// Only view if user is logged in
echo "your logged into account  " . $_SESSION ["email"];

?>

</div>
	<h1>Members</h1>
	
	// members page where links are for using CRUD features 
<a href='<?php echo base_url()."index.php/main/logout" ?>'>Logout</a>
<a href='<?php echo base_url()."index.php/main/input"; ?>'>input Details</a>
<a href='<?php echo base_url()."index.php/main/display"; ?>'>Display saved info</a>
</div>
	</div>
	   </div>
	   
</body>
</html>