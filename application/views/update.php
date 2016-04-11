<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Update details</h1>
	
   <?php  echo form_open("main/update_car/$car->carid"); ?>
                               
                            
                            
      <p>
    <input type="text" name="carid" value="<?php echo $car->carid; ?>" id="carid" hidden />
    </p>
                        
    <p>
     <label for="make">make:</label>
     <input type="text" name="make" value="<?php echo $car->make; ?>" id="make" /> 
    </p>
    
     <p>
     <label for="model">model:</label>
     <input type="text" name="model" value="<?php echo $car->model; ?>" id="model" /> 
    </p>
     
      <p>
     <label for="colour">colour:</label>
     <input type="text" name="colour" value="<?php echo $car->colour; ?>" id="colour" /> 
    </p>
      
       <p>
     <label for="paintcode">paintcode:</label>
     <input type="text" name="paintcode" value="<?php echo $car->paintcode; ?>" id="paintcode" /> 
    </p>
       
        <p>
     <label for="year">year:</label>
     <input type="text" name="year" value="<?php echo $car->year; ?>" id="year" /> 
    </p>
                             
    <p>
    <input type="submit" value="Submit" />
    </p>
                             


</div>

</body>
</html>