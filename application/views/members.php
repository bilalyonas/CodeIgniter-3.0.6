<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>
</head> 
<body>

<div id="container">
	<h1>Members</h1>
	

<?php
echo "<pre>" ; 
print_r($this->session->all_userdata()) ;
echo "</pre>" ; 

?>
	
<a href='<?php echo base_url()."index.php/main/logout" ?>'>Logout</a>
<a href='<?php echo base_url()."index.php/main/input"; ?>'>input Details</a>
<a href='<?php echo base_url()."index.php/main/display"; ?>'>Display saved info</a>
</div>

</body>
</html>