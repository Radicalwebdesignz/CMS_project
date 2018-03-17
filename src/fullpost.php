<?php 

//Include the php file being used to connect to server and database
require ("include/db.php");
//Include datetime php file
require ("include/datetime.php");
//Include the session file for category name error message
require ("include/sessions.php");
//Include the function file
require ("include/functions.php");

//Update Comments field in database

if (isset($_POST["Submit"])) {

    //Get the form Values
    //mysqli_real_escape_string() is used to avoid sql injection
    $name = $_POST["Name"];
    $name = mysqli_real_escape_string($connection, $_POST["Name"]);

    $email = $_POST["Email"];
    $email = mysqli_real_escape_string($connection, $_POST["Email"]);

    $comment = $_POST["Comment"];
    $comment = mysqli_real_escape_string($connection, $_POST["Comment"]);

    $postId = $_GET["id"];

    //Check if the form field is empty

    if (empty($name) || empty($email) || empty($comment)) {

        $_SESSION["errorMessage"] = "All Fields Are Required";
 
    } elseif (strlen($comment) > 500 || strlen($comment) < 10) { //Validation of $comment characters

        $_SESSION["errorMessage"] = "Comments Must Be Between 10 to 500 Characters Long";

    } else {

        //Insert comments form values to table
        $createQuery = "INSERT INTO comments (datetime, name, email, comment, approvedby, status, admin_panel_id) VALUES ('$dateTime', '$name', '$email', '$comment', 'pending', 'OFF', '$postId')";

        //Run the query to insert the value in to the database
        $run_createQuery = mysqli_query($connection, $createQuery);

        //If values are inserted succesfully or not validation
        if ($run_createQuery) {
            $_SESSION["successMessage"] = "Comments Submitted Succesfully";
            redirect_To ("fullpost.php?id={$postId}"); //Created a function for header redirects - See Function file
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
        <title>Full Blog Page</title>
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
                        <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                        <li class="nav-item active"><a href="blog.php" class="nav-link">Blog</a></li>
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
                        <!-- Error/Success Message for Comments Field -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameEmptyMessage(); 
                            echo categoryNameSuccessMessage(); 
                            ?>
                        </div>
                        <?php 
                            //Search button functionality

                            if (isset($_GET["searchButton"])) {

                                $search = $_GET["Search"];

                                //Select Table %search% -selects this search string in any string
                                //This selects the post of the searched words and shows only those posts
                                //if search button is not activated, then this section is skipped 
                                //and else statement is executed and all posts are shown
                                
                                $selectQuery = "SELECT * FROM admin_panel WHERE 
                                datetime LIKE '%$search%' OR title LIKE '%$search%' OR post LIKE '%$search%' OR category LIKE '%$search%' ";
                            } else {

                            //If the search button is not activated then run this and show all posts
                            
                            //Get the id# from URL
                            $idFromUrl = $_GET["id"];    
                                
                            //ORDER BY datetime desc - selects the data by datetime value in descending order
                            //Select Table
                            $selectQuery = "SELECT * FROM admin_panel WHERE id = '$idFromUrl' ORDER BY datetime desc";

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
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center pb-3 text-info"><?php echo htmlentities($postTitle); ?></h2>
                            </div>
                            <img class="img img-fluid card-img-top" src="uploaded_images/<?php echo $postImage; ?>">
                            <div class="card-body">
                                <p class="text-muted small text-center">
                                    <?php echo "Category: " . htmlentities($postCategory); 
                                          echo " | Posted On: " . htmlentities($postTime);
                                          echo " | Posted By: " . htmlentities($postAuthor);    
                                    ?>
                                </p>
                                <p class="lead p-2">
                                    <!-- nl2br function echos the text as it was formatted when submitting the post ex: shift+enter to add new paragraph while posting. It parses the html tags as well. You can add images and URL images. htmlentities will not parse the html tags -->
                                    <?php echo nl2br($postText); ?>
                                </p>
                            </div>
                         </div>
                        <!-- Close the loop after the data is written in to tbody so that it loops again and writes to tbody again - Not just once -->
                        <?php } ?>
                        <hr class="bg-light">
                        <h4 class="text-white">Comments:</h4>
                        <?php 
                            //Show comments as per the posts
                            $postIdForComments = $_GET["id"];

                            //Query to select the comments as per the post
                            $selectCommentQuery = "SELECT * FROM comments WHERE admin_panel_id = '$postIdForComments' AND status = 'ON'";

                            //Run the query
                            $commentsQuery = mysqli_query ($connection, $selectCommentQuery);

                            while ($rows = mysqli_fetch_array($commentsQuery)) {
                                $commentTime = $rows["datetime"];        
                                $commentorName = $rows["name"];        
                                $commentText = $rows["comment"];        

                        ?>
                        <div class="bg-light p-3 mt-3">
                            <p class="text-muted small pt-3">
                                <?php 
                                    echo "Posted By: " . htmlentities($commentorName); 
                                    echo " | Posted On: " . htmlentities($commentTime);
                                ?>
                            </p>
                            <img src="img/comment.png">
                            <span class="text-muted pl-4"><?php 
                                    echo nl2br($commentText); 
                                ?>
                            </span>
                            <hr>
                        </div>
                        <?php } ?>
                        <hr class="bg-light">
                        <h4 class="text-center text-warning pt-3">Share Your Thoughts About This Post</h4>
                        <h5 class="text-center text-info pb-3">Submit Your Comments Below:</h5>
                        <div>
                            <form action="fullpost.php?id=<?php echo $postId; ?>" method="POST" enctype="multipart/form-data" class="px-5 pb-5">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Name:</label>
                                    <input class="form-control" type="text" name="Name" id="name" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-muted">Email:</label>
                                    <input class="form-control" type="email" name="Email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="comment" class="text-muted">Post Comments:</label>
                                    <textarea class="form-control" name="Comment" id="comment" rows="5" placeholder="Comments" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
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
                                    $selectCategories = "SELECT * FROM categories ORDER BY datetime desc";

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
                                    $selectposts = "SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,10";

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