<?php 

//Include the php file being used to connect to server and database
require_once ("include/db.php");
//Include datetime php file
require_once ("include/datetime.php");
//Include the session file for category name error message
require_once ("include/sessions.php");
//Include the function file
require_once ("include/functions.php");

if (isset($_POST["Submit"])) {

    //Get the username
    //mysqli_real_escape_string() is used to avoid sql injection
    $username = $_POST["Username"];
    $username = mysqli_real_escape_string($connection, $_POST["Username"]);

    //Get the password
    //mysqli_real_escape_string() is used to avoid sql injection
    $password = $_POST["Password"];
    $password = mysqli_real_escape_string($connection, $_POST["Password"]);

    //Check if the category name field is empty
    
    if (empty($username) || empty($password)) {

        $_SESSION["errorMessage"] = "All Fields Must Be Filled. Try Again!";
        redirect_To ("login.php"); //Created a function for header redirects - See Function file
        exit;

    } else {

        //Login Validation
        $account_Found = login_Attempt($username, $password); //Check functions file

        //Extract the admin details to sessions
        $_SESSION["user_id"] = $account_Found["id"];
        $_SESSION["user_name"] = $account_Found["username"];

        if ($account_Found) {
            $_SESSION["successMessage"] = "Welcome {$_SESSION["user_name"]}!";
            redirect_To ("Dashboard.php"); //Created a function for header redirects - See Function file
            exit;
        } else {
            $_SESSION["errorMessage"] = "Login Failed";
            redirect_To ("login.php"); //Created a function for header redirects - See Function file
            exit;
        }
               
    }
}    

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/adminstyle.css">
        <title>Admin Login</title>
    </head>

    <body>
        <!-- Nav Section -->
        <div class="col-md-12 bg-primary pb-2">
                        
        </div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand pl-5">WEB-SKILLS</a>
            <div class="container">
                <button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    
                </div>
            </div>
        </nav>
        
        <section>
            <div class="container-fluid">
                <div class="row">
                    <!-- Login Area-->
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 py-5 my-4">
                        <h1 class="text-center py-3 text-info">LOGIN</h1>
                        <!-- Error/Success Message for Category Name Field -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameEmptyMessage(); 
                            echo categoryNameSuccessMessage(); 
                            ?>
                        </div>
                        <h2 class="lead py-3 text-info text-center">Welcome Back!!</h2>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label class="text-warning" for="username">Username:</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>    
                                    <input type="text" name="Username" class="form-control" placeholder="Username" id="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-warning" for="password">Password:</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                                    </div>    
                                    <input type="password" name="Password" class="form-control" placeholder="Password" id="password">
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <input class="btn btn-success btn-block btn-lg" type="submit" name="Submit" class="form-control" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </section>

        <!-- Footer Section-->
        <section id="footer" class="bg-dark text-white mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center pt-3">Designed & Developed By Manohar S | &copy; 2018 - All Rights Reserved</p>
                    </div>
                    <div class="col-md-12 bg-primary pb-2">
                        
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>