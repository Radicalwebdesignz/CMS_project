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

        $deleteIdFromUrl = $_GET["delete"];
        //Delete the post
        
        $deleteQuery = "DELETE FROM admin_panel WHERE id = '$deleteIdFromUrl'";
        
        //Run the query to update the value in to the database
        $run_deleteQuery = mysqli_query($connection, $deleteQuery);

        //Saving images from the post - use the function move_uploaded_file()
        
        move_uploaded_file($_FILES["Image"]["tmp_name"], $target);

        //If values are inserted succesfully or not validation
        if ($run_deleteQuery) {
            $_SESSION["successMessage"] = "Post Deleted Succesfully";
            redirect_To ("Dashboard.php"); //Created a function for header redirects - See Function file
            exit;
        } else {
            echo mysqli_error($connection);
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
        <title>Delete Post</title>
    </head>

    <body>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <!-- Left Side Area-->
                    <div class="col-sm-2">
                        <h3 class="text-center text-info py-3">WEB-SKILLS</h3>
                        <ul id="side_Menu" class="nav nav-pills d-block nav-fill">
                            <li class="nav-item"><a id="navHover" class="nav-link" href="Dashboard.php">
                                <i class="fa fa-th" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="addnewpost.php">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Add New Post</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="Categories.php">
                                <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;Categories</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Manage Admins</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="#">
                                <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Comments</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="">
                                <i class="fa fa-spinner" aria-hidden="true"></i>&nbsp;Live Blog</a></li>
                            <li class="nav-item"><a id="navHover" class="nav-link" href="#">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                        </ul>
                    </div>
                    <!-- Add New Post Area-->
                    <div class="col-sm-10">
                        <h1 class="text-center py-3 text-info">DELETE POST</h1>
                        <!-- Error/Success Message for Category Name Field -->
                        <div class="text-center">
                            <?php 
                            echo categoryNameEmptyMessage(); 
                            ?>
                        </div>
                        <h2 class="lead py-3">Edit Details:</h2>
                        <div>
                            <?php 
                                //Editing Post functionality
                                
                                //Get the edit id# from the URL
                                
                                $searchParameterFromURL = $_GET["delete"];

                                //Select The database
                                
                                $editQuery = "SELECT * FROM admin_panel WHERE id = '$searchParameterFromURL'";

                                //Run the query
                                $run_editQuery = mysqli_query ($connection, $editQuery);

                                //Get the data from the selected query
                                
                                while ($rows = mysqli_fetch_array($run_editQuery)) {
                                    $titleToBeUpdated = $rows["title"];        
                                    $categoryToBeUpdated = $rows["category"];        
                                    $imageToBeUpdated = $rows["image"];        
                                    $postToBeUpdated = $rows["post"];        
                                }

                                //Updated these values in the respective form fields by setting their values

                            ?>
                            <!-- Action needs to be changed because when the submit button is activated and editpost.php is loaded
                                 then S_GET["edit"] fails as this url link doesnot exist-We need to have the editpost.php with edit id      
                            -->    
                            <form action="deletepost.php?delete=<?php echo $searchParameterFromURL; ?>" method="POST" enctype="multipart/form-data" class="px-5 pb-5">
                                <div class="form-group">
                                    <label for="titleText" class="text-warning">Update Title:</label>
                                    <input value = "<?php echo $titleToBeUpdated; ?>" class="form-control" type="text" name="Title" id="titleText" placeholder="Title" disabled>
                                </div>
                                <div class="form-group">
                                    <span class="text-success">Current Category: <?php echo $categoryToBeUpdated . "<br>"; ?></span>
                                    <label for="category" class="text-warning">Update Category:</label>
                                    <select class="form-control" name="Category" id="category" disabled>
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
                                    <span class="text-success">Current Image: <img class="img img-fluid" width="100px" height="75px" src="uploaded_images/<?php echo $imageToBeUpdated; ?>"></span><br>
                                    <label for="selectImage" class="text-warning">Update Image:</label>
                                    <input class="form-control" type="file" name="Image" id="selectImage" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="posttext" class="text-warning">Update Content:</label>
                                    <textarea class="form-control" name="Post" id="posttext" rows="5" disabled><?php echo $postToBeUpdated;?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="Submit" class="btn btn-success btn-block" value="Delete Post">
                                </div>
                            </form>
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