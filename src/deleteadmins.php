<?php 
//Include the php file being used to connect to server and database
require ("include/db.php");
//Include datetime php file
require ("include/datetime.php");
//Include the session file for category name error message
require ("include/sessions.php");
//Include the function file
require ("include/functions.php");

if (isset($_GET["id"])) {

    $idFromUrl = $_GET["id"];

    //Update Query
    $updateQuery = "DELETE FROM registration WHERE id = '$idFromUrl'";

    //Run Query
    $run_updateQuery = mysqli_query($connection, $updateQuery);

    //Check if update is succesfull
    if ($run_updateQuery) {
            $_SESSION["successMessage"] = "Admin Deleted Succesfully";
            redirect_To ("manageadmins.php"); //Created a function for header redirects - See Function file
            exit;
        } else {
            echo mysqli_error($connection);
    }
}

?>

