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
print_r($this->session->all_uderdata()) ;
echo "</pre>" ; 

?>
</div>

</body>
</html>