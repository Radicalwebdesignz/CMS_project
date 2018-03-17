<?php 
//Start the session
session_start();

//Function to output the error message when the category name field is empty

function categoryNameEmptyMessage () {
	//Check if the session by the name errorMessage is set
	if(isset($_SESSION["errorMessage"])) {

		//Create a variable to output the error message
		$Erroroutput = "<div class=\"alert alert-danger\">";

		//Add the session message - htmlentities is used to add the text without breaking the html
		$Erroroutput .= htmlentities($_SESSION["errorMessage"]); 

		//Add the ending div
		$Erroroutput .= "</div>";

		//Set the message session to null so that when the user open the browser, message is not printed.
		$_SESSION["errorMessage"] = null;

		//Store the output
		return $Erroroutput;
	}
}

//Function to output the success message when the category name field is filled and submitted

function categoryNameSuccessMessage () {
	//Check if the session by the name errorMessage is set
	if(isset($_SESSION["successMessage"])) {

		//Create a variable to output the error message
		$successOutput = "<div class=\"alert alert-success\">";

		//Add the session message - htmlentities is used to add the text without breaking the html
		$successOutput .= htmlentities($_SESSION["successMessage"]); 

		//Add the ending div
		$successOutput .= "</div>";

		//Set the message session to null so that when the user open the browser, message is not printed.
		$_SESSION["successMessage"] = null;

		//Store the output
		return $successOutput;
	}
}

?>