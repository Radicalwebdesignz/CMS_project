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
        <title>Manage Comments</title>
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
                            <li class="nav-item"><a id="navHover" class="nav-link" href="addnewpost.php">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Add New Post</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="categories.php">
                                <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;Categories</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="manageadmins.php">
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Manage Admins</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link active" href="comments.php">
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
                        <!-- Un-Approved comments section-->
                        <h1 class="text-center py-4 text-info">Un-Approved Comments</h1>
                        <!-- Error/Success Message for Category Name Field -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameSuccessMessage(); 
                            ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-center table-hover">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Comment</th>
                                        <th>Approve</th>
                                        <th>Delete Comment</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        //Serial number
                                        $commentsSerialNo = 0;

                                        //Select Comments table
                                        $commentsQuery = "SELECT * FROM comments WHERE status = 'OFF' ORDER BY id desc";

                                        //Run the comments query
                                        $run_commentsQuery = mysqli_query ($connection, $commentsQuery);

                                        //Fetch Comments data rows
                                        while ($rows = mysqli_fetch_array($run_commentsQuery)) {

                                            $commentorName = $rows["name"];
                                            $commentsDate = $rows["datetime"];
                                            $commentsText = $rows["comment"];
                                            $commentsId = $rows["id"];
                                            $commentsPostId = $rows["admin_panel_id"];
                                            $commentsSerialNo++;

                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($commentsSerialNo); ?></td>
                                        <td class="text-info"><?php echo htmlentities($commentorName); ?></td>
                                        <td><?php echo htmlentities($commentsDate); ?></td>
                                        <td>
                                            <?php 
                                            if (strlen($commentsText) > 15 ) {
                                                $commentsText = substr($commentsText, 0, 15);
                                                echo htmlentities($commentsText) . "...";
                                            } else {
                                                echo htmlentities($commentsText);
                                            } 
                                            ?>
                                        </td>
                                        <td><a href="approvecomments.php?id=<?php echo $commentsId; ?>" class="btn btn-success btn-sm">Approve</a></td>
                                        <td><a href="deletecomments.php?id=<?php echo $commentsId; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                        <td><a href="fullpost.php?id=<?php echo $commentsPostId; ?>" target="_blank" class="btn btn-primary btn-sm">Live Preview</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Approved comments section-->
                        <h1 class="text-center py-4 text-info">Approved Comments</h1>
                        <div class="table-responsive">
                            <table class="table text-center table-hover">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Comment</th>
                                        <th>Approved By</th>
                                        <th>Disapprove</th>
                                        <th>Delete Comment</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        $admin = "Admin";

                                        //Serial number
                                        $commentsSerialNo = 0;

                                        //Select Comments table
                                        $commentsQuery = "SELECT * FROM comments WHERE status = 'ON' ORDER BY id desc";

                                        //Run the comments query
                                        $run_commentsQuery = mysqli_query ($connection, $commentsQuery);

                                        //Fetch Comments data rows
                                        while ($rows = mysqli_fetch_array($run_commentsQuery)) {

                                            $commentorName = $rows["name"];
                                            $commentsDate = $rows["datetime"];
                                            $commentsText = $rows["comment"];
                                            $commentsId = $rows["id"];
                                            $commentsPostId = $rows["admin_panel_id"];
                                            $commentsApprovedBy = $rows["approvedby"];
                                            $commentsSerialNo++;

                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($commentsSerialNo); ?></td>
                                        <td class="text-info"><?php echo htmlentities($commentorName); ?></td>
                                        <td><?php echo htmlentities($commentsDate); ?></td>
                                        <td><?php 
                                            if (strlen($commentsText) > 15 ) {
                                                $commentsText = substr($commentsText, 0, 15);
                                                echo htmlentities($commentsText) . "...";
                                            } else {
                                                echo htmlentities($commentsText);
                                            } 
                                            ?>
                                        </td>
                                        <td><?php echo htmlentities($commentsApprovedBy); ?></td>
                                        <td><a href="disapprovecomments.php?id=<?php echo $commentsId; ?>" class="btn btn-warning btn-sm">Disapprove</a></td>
                                        <td><a href="deletecomments.php?id=<?php echo $commentsId; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                        <td><a href="fullpost.php?id=<?php echo $commentsPostId; ?>" target="_blank" class="btn btn-primary btn-sm">Live Preview</a></td>
                                    </tr>
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