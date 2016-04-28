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
	<h1>Car Details</h1>
	<div id="mainpar">
<?php

// view details of cars 
echo "<p>ID: ";
echo $car->carid;
echo "</p>"; 


echo "<p>Make: ";
echo $car->make;
echo "</p>";


echo "<p>Model: ";
echo $car->model;
echo "</p>";


echo "<p>Colour: ";
echo $car->colour;
echo "</p>";

echo "<p>Paint Code: ";
echo $car->paintcode;
echo "</p>";


echo "<p>Year: ";
echo $car->year;
echo "</p>";
?>
</div>
</div>
    </div>
       </div>
       
</body>
</html>