<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Members</h1>
	
<?

echo "<pre>" ; 
echo $this->session->all_uderdata() ;
echo "</pre>"
</div>

</body>
</html>