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
        <title>Admin Dashboard</title>
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
                            <li class="nav-item"><a id="navHover" class="nav-link active" href="Dashboard.php">
                                <i class="fa fa-th" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="addnewpost.php">
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
                    
                    <!-- Main Area-->
                    <div class="col-sm-10">
                        <h1 class="text-center py-4 text-info">ADMIN DASHBOARD</h1>
                        <!-- Error/Success Message for Post Edit -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameSuccessMessage(); 
                            ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Post Title</th>
                                        <th>Date Posted</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Banner</th>
                                        <th>Comments</th>
                                        <th>Action</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        //ORDER BY datetime desc - selects the data by id value in table in descending order
                                        
                                        //Select Table
                                        $selectQuery = "SELECT * FROM admin_panel ORDER BY id desc";
                                        //Run query
                                        $run_selectQuery = mysqli_query ($connection, $selectQuery);

                                        //We do not want id no. from database which will be scattered - Instead we want an ordered no.
                                        $serialNumber = 0;

                                        //Write the selected array data in table
                                        while ($rows = mysqli_fetch_array($run_selectQuery)) {

                                            $postedId = $rows["id"];
                                            $postedTitle = $rows["title"];
                                            $postedDate = $rows["datetime"];
                                            $postedAuthor = $rows["author"];
                                            $postedcategory = $rows["category"];
                                            $postedImage = $rows["image"];
                                            $postedText = $rows["post"];
                                            $serialNumber++;

                                    ?>    
                                    <tr>
                                        <td><?php echo $serialNumber; ?></td>
                                        <td class="text-info">
                                            <?php 
                                                if(strlen($postedTitle) > 20) {
                                                    $postedTitle = substr($postedTitle, 0,20);
                                                    echo htmlentities($postedTitle) . "...";
                                                } else echo htmlentities($postedTitle);
                                            ?>
                                        </td>
                                        <td><?php echo $postedDate; ?></td>
                                        <td><?php echo $postedAuthor; ?></td>
                                        <td><?php echo $postedcategory; ?></td>
                                        <td><img class="img img-fluid" width="100px" height="75px" src="uploaded_images/<?php echo $postedImage; ?>"></td>
                                        <td>
                                            <?php

                                                //Count For Approved comments 

                                                //Select and count all comments from comments table where the id matches
                                                $queryApprovedComments = "SELECT COUNT(*) FROM comments WHERE admin_panel_id = '$postedId' AND status='ON'";

                                                //Run query
                                                $run_queryApprovedComments = mysqli_query ($connection, $queryApprovedComments);

                                                //Fetch the counted array
                                                $rowsApproved = mysqli_fetch_array($run_queryApprovedComments);
                                                $totalApproved = array_shift($rowsApproved);

                                                if ($totalApproved > 0) {

                                            ?>
                                            <span class="badge badge-success m-2">
                                                <?php    
                                                    echo $totalApproved;
                                                ?>
                                            </span>
                                            <?php } ?>

                                            <?php

                                                //Count For UnApproved comments 

                                                //Select and count all comments from comments table where the id matches
                                                $queryUnapprovedComments = "SELECT COUNT(*) FROM comments WHERE admin_panel_id = '$postedId' AND status='OFF'";

                                                //Run query
                                                $run_queryUnapprovedComments = mysqli_query ($connection, $queryUnapprovedComments);

                                                //Fetch the counted array
                                                $rowsUnapproved = mysqli_fetch_array($run_queryUnapprovedComments);
                                                $totalUnapproved = array_shift($rowsUnapproved);

                                                if ($totalUnapproved > 0) {

                                            ?>
                                            <span class="badge badge-warning m-2">
                                                <?php    
                                                    echo $totalUnapproved;
                                                ?>
                                            </span>
                                            <?php } ?>    
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="editpost.php?edit=<?php echo $postedId; ?>">Edit</a>
                                            <span>&nbsp;|&nbsp;</span>
                                            <a class="btn btn-danger btn-sm" href="deletepost.php?delete=<?php echo $postedId; ?>">Delete</a>
                                        </td>
                                        <td><a class="btn btn-primary btn-sm" href="fullpost.php?id=<?php echo $postedId; ?>" target="_blank">Live Preview</a></td>
                                    </tr>
                                    <!-- Close the loop after the data is written in to tbody so that it loops again and writes to tbody again - Not just once -->
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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