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
	<h1>Display Data</h1>
<h2> </h2>
<table class="table">
	   
                        <thead>
                            <tr>
                            <td>All cars available to search</td>
							
                             
                            </tr>
							
                        </thead>
                        <tbody>
					 
                            <tr>
							
                                <?php 
                                            foreach($cars as $car):
                                ?>
                                <td><?= anchor("main/car_details/{$car->carid}",$car->make) ?></td>
                                <td><?= anchor("main/edit/{$car->carid}", "Update") ?></td>
								 <td><?= anchor("main/delete/{$car->carid}", "Delete") ?></td>

                            </tr>
                            <?php endforeach; ?>
							       </div>              
                        </tbody>
                    </table>

	</div>
	   </div>
	   </div>
	   
</body>
</html>