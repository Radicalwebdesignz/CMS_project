<?php 
//Include the session file for category name error message
require_once ("include/sessions.php");
//Include the php file being used to connect to server and database
require_once ("include/db.php");

//Create a function for redirects using header

function redirect_To ($new_Location) {
	header ("Location:{$new_Location}");
	exit;
}

//Admin User Login Validation

function login_Attempt ($username, $password) {
	//Make Connection Global
	global $connection;
	//Select the values from registration table
	$select_Query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";

	//Run the query
	$run_selectQuery = mysqli_query ($connection, $select_Query);

	if ($adminData = mysqli_fetch_assoc($run_selectQuery)) {
		return $adminData;
	} else {
		return null;
	}
}

//Function to check if any admin is logged in

function login () {
	if (isset($_SESSION["user_id"])) {
		return true;
	}
}

//Confirm login function

function confirmLogin () {
	//If the login function is false or session user id is not set
	if (!login()) {
		$_SESSION["errorMessage"] = "Login Required!";
		redirect_To ("login.php");
		exit;
	} 
}



?>