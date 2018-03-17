<?php 
	
	//Connect to database
	$connection = mysqli_connect("localhost", "root", "", "phpcms");

	if ($connection) {

	} else {
		echo mysqli_error($connection);
	}

?>