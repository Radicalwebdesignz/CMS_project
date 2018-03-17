<?php 

//Include the php file being used to connect to server and database
require_once ("include/db.php");
//Include datetime php file
require_once ("include/datetime.php");
//Include the session file for category name error message
require_once ("include/sessions.php");
//Include the function file
require_once ("include/functions.php");
//Check if admin is logged in - If not, redirect to login.php - Check function file
confirmLogin ();

if (isset($_POST["Submit"])) {

    //Get the form Values
    //mysqli_real_escape_string() is used to avoid sql injection
    $postCategory = $_POST["Category"];
    $postCategory = mysqli_real_escape_string($connection, $_POST["Category"]);

    $postTitle = $_POST["Title"];
    $postTitle = mysqli_real_escape_string($connection, $_POST["Title"]);

    $postText = $_POST["Post"];
    $postText = mysqli_real_escape_string($connection, $_POST["Post"]);

    //We cannot add the image to the database - ["name"] - Just adds the name of the image file
    $image = $_FILES["Image"]["name"];

    // This is the path name for the posted images to be saved
    $target = "uploaded_images/".basename($_FILES["Image"]["name"]);

    //Check if the form field is empty
    
    if (empty($postTitle)) {

        $_SESSION["errorMessage"] = "Title Cannot Be Empty. Try Again!";
        redirect_To ("addnewpost.php"); //Created a function for header redirects - See Function file
        exit;

    } elseif (strlen($postTitle) > 200 || strlen($postTitle) < 3) { //Validation of $postTitle > 100 charactres

        $_SESSION["errorMessage"] = "Title Must Be Between 3 to 100 Characters Long";
        redirect_To ("addnewpost.php"); //Created a function for header redirects - See Function file
        exit;

    } else {

        //Create a Category Creater name
        $author = $_SESSION["user_name"];

        //Insert Values in to category table
        $createQuery = "INSERT INTO admin_panel(datetime, title, category, author, image, post) VALUES ('$dateTime', '$postTitle', '$postCategory', '$author', '$image', '$postText')";

        //Run the query to insert the value in to the database
        $run_createQuery = mysqli_query($connection, $createQuery);

        //Saving images from the post - use the function move_uploaded_file()
        
        move_uploaded_file($_FILES["Image"]["tmp_name"], $target);

        //If values are inserted succesfully or not validation
        if ($run_createQuery) {
            $_SESSION["successMessage"] = "New Post Added Succesfully";
            redirect_To ("addnewpost.php"); //Created a function for header redirects - See Function file
            exit;
        } else {
            echo mysqli_error($connection);
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
        <title>Manage Categories</title>
    </head>

    <body>

        <!-- Nav Section -->
        <div class="col-md-12 bg-primary pb-2">
                        
        </div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="Dashboard.php" class="navbar-brand pl-5">WEB-SKILLS</a>
            <div class="container">
                <button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="Dashboard.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="blog.php?page=1" target="_blank" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="aboutus.php" target="_blank" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="services.php" target="_blank" class="nav-link">Services</a></li>
                    </ul>
                    <div class="text-white ml-auto small">
                        <u>Admin Logged in : 
                            <?php
                                login ();
                                if (login()) {
                                    echo $_SESSION["user_name"];
                                } else {
                                    echo "None";
                                }
                            ?>
                        </u>
                    </div>
                    <form action="blog.php" class="form-inline ml-auto">
                        <input class="form-control mr-2" placeholder="Search" name="Search" type="text">
                        <button class="btn btn-success" name="searchButton">Go</button>
                    </form>

                </div>
            </div>
        </nav>
        
        <section>
            <div class="container-fluid">
                <div class="row">
                    <!-- Left Side Area-->
                    <div class="col-sm-2 pt-4">
                        <ul id="side_Menu" class="nav nav-pills d-block nav-fill">
                            <li class="nav-item"><a id="navHover" class="nav-link" href="Dashboard.php">
                                <i class="fa fa-th" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link active" href="addnewpost.php">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Add New Post</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="categories.php">
                                <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;Categories</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="manageadmins.php">
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Manage Admins</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="comments.php">
                                <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Comments
                                <?php

                                                //Count For Total UnApproved comments 

                                                //Select and count all comments from comments table where the id matches
                                                $queryTotalUnapprovedComments = "SELECT COUNT(*) FROM comments WHERE status='OFF'";

                                                //Run query
                                                $run_queryTotalUnapprovedComments = mysqli_query ($connection, $queryTotalUnapprovedComments);

                                                //Fetch the counted array
                                                $rowsTotalUnapproved = mysqli_fetch_array($run_queryTotalUnapprovedComments);
                                                $totalUnapproved = array_shift($rowsTotalUnapproved);

                                                if ($totalUnapproved > 0) {

                                            ?>
                                            <span class="badge badge-warning m-2">
                                                <?php    
                                                    echo $totalUnapproved;
                                                ?>
                                            </span>
                                            <?php } ?>
                            </a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="blog.php?page=1" target="_blank">
                                <i class="fa fa-spinner" aria-hidden="true"></i>&nbsp;Live Blog</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="logout.php">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                        </ul>
                    </div>

                    <!-- Add New Post Area-->
                    <div class="col-sm-10">
                        <h1 class="text-center py-3 text-info">ADD NEW POST</h1>
                        <!-- Error/Success Message for Category Name Field -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameEmptyMessage(); 
                            echo categoryNameSuccessMessage(); 
                            ?>
                        </div>
                        <h2 class="lead py-3">Post Details:</h2>
                        <form action="addnewpost.php" method="POST" enctype="multipart/form-data" class="px-5 pb-5">
                            <div class="form-group">
                                <label for="titleText" class="text-muted">Title:</label>
                                <input class="form-control" type="text" name="Title" id="titleText" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label for="category" class="text-muted">Select Category:</label>
                                <select class="form-control" name="Category" id="category" required>
                                    <?php 

                                        //ORDER BY datetime desc - selects the data by datetime value in descending order
                                        
                                        //Select Table
                                        $selectQuery = "SELECT * FROM categories ORDER BY datetime desc";
                                        //Run query
                                        $run_selectQuery = mysqli_query ($connection, $selectQuery);

                                        //Write the selected array data in table
                                        while ($rows = mysqli_fetch_array($run_selectQuery)) {

                                            $createdCategory = $rows["name"];

                                    ?>    
                                        <option><?php echo $createdCategory; ?></option>
                                    <!-- Close the loop after the data is written in to tbody so that it loops again and writes to tbody again - Not just once -->
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectImage" class="text-muted">Upload Image:</label>
                                <input class="form-control" type="file" name="Image" id="selectImage" required>
                            </div>
                            <div class="form-group">
                                <label for="posttext" class="text-muted">Post Content:</label>
                                <textarea class="form-control" name="Post" id="posttext" rows="5" placeholder="Post Content. Min. 500 Characters" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Submit" class="btn btn-success btn-block" value="Add New Post">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section-->
        <section id="footer" class="bg-dark text-white">
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