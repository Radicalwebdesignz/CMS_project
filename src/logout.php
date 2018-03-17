<?php 

//Include the php file being used to connect to server and database
require_once ("include/db.php");
//Include datetime php file
require_once ("include/datetime.php");
//Include the session file for category name error message
require_once ("include/sessions.php");
//Include the function file
require_once ("include/functions.php");

//$_SESSION["user_id"] is used to validate if the user is logged in - Hence set this to null
$_SESSION["user_id"] = null;

//and kill the session
session_destroy();
redirect_To ("login.php"); //Created a function for header redirects - See Function file

?>