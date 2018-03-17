<?php 
//Include the php file being used to connect to server and database
require ("include/db.php");
//Include datetime php file
require ("include/datetime.php");
//Include the session file for category name error message
require ("include/sessions.php");
//Include the function file
require ("include/functions.php");

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
        <title>Blog Page</title>
    </head>

    <body>
        <!-- Nav Section -->
        <div class="col-md-12 bg-primary pb-2">
                        
        </div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="blog.php?page=1" class="navbar-brand pl-5">WEB-SKILLS</a>
            <div class="container">
                <button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="blog.php?page=1" class="nav-link">Home</a></li>
                        <li class="nav-item active"><a href="blog.php?page=1" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="Dashboard.php" target="_blank" class="nav-link">Dashboard</a></li>
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
                    <form action="blog.php" mrthod="GET" class="form-inline ml-auto">
                        <input class="form-control mr-2" placeholder="Search" name="Search" type="text">
                        <button class="btn btn-success" name="searchButton">Go</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Area -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center py-4">
                        <h1 class="text-info">The Complete Full-Stack Web Developer Skills</h1>
                        <p class="text-muted">Gain the functional knowledge and ability to take a concept and turn it into a finished product</p>
                    </div>
                    <!-- Blog Area -->
                    <div class="col-md-8">
                        <?php 
                            //When search button is active - When searched

                            if (isset($_GET["searchButton"])) {

                                $search = $_GET["Search"];

                                //Select Table %search% -selects this search string in any string
                                $selectQuery = "SELECT * FROM admin_panel WHERE 
                                datetime LIKE '%$search%' OR title LIKE '%$search%' OR post LIKE '%$search%' OR category LIKE '%$search%' ";
                            }

                            //This will be active when user clicks on categories in side bar
                                
                            elseif (isset($_GET["category"])) {
                                $categorySearch = $_GET["category"];

                                //Selects table with category name = $categorySearch
                                $selectQuery = "SELECT * FROM admin_panel WHERE category LIKE '$categorySearch' ORDER BY id desc";
                            } 

                            //This is for the pagination when active - i.e blog.php?page=1
                            
                            elseif (isset($_GET["page"])) { 
                                
                                //Get the page id from the url
                                $page = $_GET["page"];

                                if ($page <= 0) { //If page = 0 or negative show posts from index 0 by default
                                    $showPostFrom = 0;
                                } else {

                                    //Algorithem for LIMIT (starting from, howmany) - to show posts from where the starting from index no. it should start
                                    //This shows posts(index) in multiples of 5 - 5 posts
                                    $showPostFrom = ($page*2) -2;
                                }

                                //ORDER BY id desc - selects the data by id value in descending order
                                //Select Table rows data with a limit of number of rows data
                                $selectQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT $showPostFrom, 2";

                            } 

                            //If the search button is not activated then run this - Default blog page area
                            
                            else {
                               
                            //ORDER BY id desc - selects the data by id value in descending order
                            //Select Table rows data with a limit of number of rows data to 2 -same as for pagination condition
                            $selectQuery = "SELECT * FROM admin_panel ORDER BY id desc";

                            }

                            //Run query
                            $run_selectQuery = mysqli_query ($connection, $selectQuery);

                            //Write the selected array data in table
                            while ($rows = mysqli_fetch_array($run_selectQuery)) {

                                $postId = $rows["id"];
                                $postTime = $rows["datetime"];
                                $postTitle = $rows["title"];
                                $postCategory = $rows["category"];
                                $postAuthor = $rows["author"];
                                $postImage = $rows["image"];
                                $postText = $rows["post"];    

                        ?>    
                        <div class="card text-center mb-5">
                            <div class="card-header  bg-info text-white">
                                <h2 class=""><?php echo htmlentities($postTitle); ?></h2>
                            </div>    
                            <img class="img img-fluid card-img-top" src="uploaded_images/<?php echo $postImage; ?>">
                            <div class="card-block">
                                <div class="card-title small text-muted pt-2">
                                    <p class="">
                                        <?php echo "Category: " . htmlentities($postCategory); 
                                              echo " | Posted On: " . htmlentities($postTime);
                                              echo " | Posted By: " . htmlentities($postAuthor);    
                                        ?>
                                        
                                        <!--Show the count of comments -->
                                        <?php

                                                //Count For Approved comments 

                                                //Select and count all comments from comments table where the id matches
                                                $queryApprovedComments = "SELECT COUNT(*) FROM comments WHERE admin_panel_id = '$postId' AND status='ON'";

                                                //Run query
                                                $run_queryApprovedComments = mysqli_query ($connection, $queryApprovedComments);

                                                //Fetch the counted array
                                                $rowsApproved = mysqli_fetch_array($run_queryApprovedComments);
                                                $totalApproved = array_shift($rowsApproved);

                                                if ($totalApproved > 0) {

                                        ?>
                                                <span class="badge badge-dark ml-3 p-2">
                                        <?php    
                                                echo "Comments : " . $totalApproved;
                                        ?>
                                                </span>
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="card-text px-5">    
                                    <p class="lead">
                                        <?php 
                                            if(strlen($postText) > 150) {
                                                $postText = substr($postText, 0,150);
                                                echo nl2br($postText) . "...";
                                            } else echo nl2br($postText);
                                        ?>
                                    </p>
                                </div>    
                            </div>
                            <div class="card-footer">
                                <a href="fullpost.php?id=<?php echo $postId; ?>">
                                    <span class="btn btn-info">Read More &rsaquo;&rsaquo;&rsaquo;</span>
                                </a>
                            </div>
                        </div>
                        <!-- Close the loop after the data is written in to tbody so that it loops again and writes to tbody again - Not just once -->
                        <?php } ?>

                        <!-- Pagination for posts-->
                        <div class="p-5">
                            <!-- Prev Button Functionality -->
                            <?php 

                                //Show Pagination only if page no. is set in blog url - blog.php?page=0 else dont show pagination
                                //If this condition is not added, then when blog.php undefined variable error occurs as page id is empty
                                if (isset($_GET["page"])) {
                                    //Previous page button
                                    if ($page > 1) { ?>
                                        <a class="d-inline btn btn-outline-secondary" href="blog.php?page=<?php echo $page-1; ?>">&laquo;</a>
                                <?php }}
                            ?>

                            <?php 

                                //Calculate the total number of posts available in database
                                $countPaginationQuery = "SELECT COUNT(*) FROM admin_panel";

                                //Run query
                                $run_countPaginationQuery = mysqli_query ($connection, $countPaginationQuery);

                                //fetch all row data in arrays
                                $rowPagination = mysqli_fetch_array($run_countPaginationQuery);   

                                //Since we are not running while loop, to get the data rows run array_shift function to get all the row data
                                $totalRows = array_shift($rowPagination);

                                //No. of pages for pagination
                                $postPagination = $totalRows/2; //Number 2 is same as mentioned above in pagination condition

                                //If posts per page is a floating number - Need to convert it to integer to the upper limit using CEIL
                                $postPagination = ceil($postPagination);

                                //Creating pagination using for loop
                                for ($i=1; $i <= $postPagination; $i++) {

                                //Show Pagination only if page no. is set in blog url - blog.php?page=0 else dont show pagination
                                //If this condition is not added, then when blog.php undefined variable error occurs as page id is empty
                                if (isset($_GET["page"])) {

                                    //Condition to make the selected pagination active
                                    if ($i == $_GET["page"]) {

                            ?>
                                <a class="d-inline bg-primary btn text-white" href="blog.php?page=<?php echo $i;?>"><?php echo $i; ?></a>
                                <?php 
                                    } else { 
                                ?>
                                    <a class="d-inline btn btn-outline-secondary" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a> 
                            <?php
                                }}} 
                            ?>
                            <!-- Next Button Functionality -->
                            <?php 

                                //Show Pagination only if page no. is set in blog url - blog.php?page=0 else dont show pagination
                                //If this condition is not added, then when blog.php undefined variable error occurs as page id is empty
                                if (isset($_GET["page"])) {
                                    //Next page button
                                    if ($page < $postPagination) { ?>
                                        <a class="d-inline btn btn-outline-secondary" href="blog.php?page=<?php echo $page+1; ?>">&raquo;</a>
                                <?php }}
                            ?>
                        </div>
                    </div>

                    <!-- Side Bar -->
                    <div class="col-md-4">
                        <!-- About Me Section -->
                        <div class="card text-center mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="text-center">About Me</h5>
                            </div>
                            <img src="img/aboutme.jpeg" class="img img-fluid rounded-circle card-img-top w-75 align-self-center m-3">    
                            <div class="card-block">
                                <div class="card-text p-3">
                                    <p class="text-muted">I consider myself to be extremely fortunate, because my job, such as it is, simply entails doing what I love. I call myself a designer as it’s a nice umbrella term for the web design / print design / illustration / branding work that I do.</p>
                                    <p class="text-muted">I enjoy meeting new people and finding ways to help them have an uplifting experience.I enjoy reading, and the knowledge and perspective that my reading gives me has strengthened my teaching skills and presentation abilities.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Categories Side Bar -->
                        <div class="card text-center mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="text-center">Categories</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                
                                <?php 

                                    //Select categories Table
                                    $selectCategories = "SELECT * FROM categories ORDER BY id desc";

                                    //Run Query
                                    $run_selectCategories = mysqli_query ($connection, $selectCategories);

                                    while ($dataRows = mysqli_fetch_array($run_selectCategories)) {
                                        $fetchCategoryName = $dataRows["name"];
                                        $fetchId = $dataRows["id"];
                                    ?>
                                        <li class="list-group-item bg-dark">
                                            <a href="blog.php?category=<?php echo $fetchCategoryName; ?>" class="text-white card-link">
                                                <?php echo htmlentities($fetchCategoryName); ?>
                                            </a>
                                        </li>    

                                <?php } ?>

                            </ul>
                            <div class="card-footer bg-info">
                                
                            </div>
                        </div>
                        <!-- Recent Posts Side Bar -->
                        <div class="card text-center mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="text-center">Recent Posts</h5>
                            </div>
                               
                                <?php 

                                    //Select posts Table with all posts in ascending order as per date and limit the data rows to 10
                                    $selectposts = "SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,10";

                                    //Run Query
                                    $selectposts = mysqli_query ($connection, $selectposts);

                                    while ($dataRows = mysqli_fetch_array($selectposts)) {
                                        $fetchPostTitle = $dataRows["title"];
                                        $fetchId = $dataRows["id"];
                                        $fetchImage = $dataRows["image"];
                                        $fetchTime = $dataRows["datetime"];
                                    ?>
                                        <div class="card-block">
                                            <a href="fullpost.php?id=<?php echo $fetchId; ?>" class="text-white card-link">     
                                                <div class="card p-4 m-3 bg-light">
                                                    <div class="card-header bg-primary">
                                                        <h6>
                                                            <?php
                                                                if (strlen($fetchPostTitle) > 25) {
                                                                    $fetchPostTitle = substr($fetchPostTitle, 0,25);
                                                                    echo $fetchPostTitle . "...";
                                                                } else {
                                                                    echo $fetchPostTitle;
                                                                }
                                                            ?>
                                                        </h6>
                                                    </div>
                                                    <img class="img img-fluid card-img-top"src="uploaded_images/<?php echo $fetchImage; ?>">
                                                    <div class="card-footer">
                                                        <p class="text-muted small"><?php echo "Posted On: " . $fetchTime; ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                <?php } ?>

                            </ul>
                            <div class="card-footer bg-warning">
                                
                            </div>
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