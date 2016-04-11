<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Car Details</h1>
<?php
echo $car->carid;
echo "<br>";
echo $car->make;
echo "<br>";
echo $car->model;
echo "<br>";
echo $car->colour;
echo "<br>";
echo $car->paintcode;
echo "<br>";
echo $car->year;
?>

</div>

</body>
</html>