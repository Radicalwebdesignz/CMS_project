<?php 
	
	//By Default the time zone fetched is of the server. You ned to specify the timezone to be used
	date_default_timezone_set("Asia/Kolkata");	

	//Gets the current time of server
	$currentTime = time();

	//Convert the current time to time format
	//$dateTime = strftime("%Y-%m-%d %H:%M:%S", $currentTime);
	$dateTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);
	
?>