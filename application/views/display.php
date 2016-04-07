<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to bilal</title>

<body>

<div id="container">
	<h1>Display Data</h1>
<h2> </h2>
<table class="table">
                        <thead>
                            <tr>
                                <td>Recipe No</td>
                                <td>Recipe Title</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                            foreach($cars as $car):
                                ?>
                                <td><?= anchor("main/car_details/{$car->carid}",$car->make) ?></td>

                            </tr>
                            <?php endforeach; ?>
							                     
                        </tbody>
                    </table>
</body>
</html>