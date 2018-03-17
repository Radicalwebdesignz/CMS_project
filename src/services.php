<?php 

//Include the php file being used to connect to server and database
require_once ("include/db.php");
//Include datetime php file
require_once ("include/datetime.php");
//Include the session file for category name error message
require_once ("include/sessions.php");
//Include the function file
require_once ("include/functions.php");

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
            <a href="blog.php?page=1" class="navbar-brand pl-5">WEB-SKILLS</a>
            <div class="container">
                <button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="blog.php?page=1" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="blog.php?page=1" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
                        <li class="nav-item active"><a href="services.php" class="nav-link">Services</a></li>
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
                    <form action="blog.php" class="form-inline ml-auto">
                        <input class="form-control mr-2" placeholder="Search" name="Search" type="text">
                        <button class="btn btn-success" name="searchButton">Go</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- About Us Section-->

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-white my-4">
                    <h2>Learn To Code - Full Stack Web Developer</h2>
                    <p class="lead">All you ever need to master the skills required</p>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>HTML</h3>
                        </div>
                        <img src="img/html.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">HTML 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>CSS</h3>
                        </div>
                        <img src="img/css.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">CSS 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>JavaScript</h3>
                        </div>
                        <img src="img/js.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">JavaScript 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>Bootstrap</h3>
                        </div>
                        <img src="img/bs.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">Bootstrap 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>jQuery</h3>
                        </div>
                        <img src="img/jquery.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">jQuery 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>PHP</h3>
                        </div>
                        <img src="img/php.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">PHP 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>MYSQL</h3>
                        </div>
                        <img src="img/mysql.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">MYSQL 101</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3>LARAVEL</h3>
                        </div>
                        <img src="img/laravel.jpg" class="card-img-top img img-fluid">
                        <div class="card-footer">
                            <p class="text-muted pt-3">LARAVEL 101</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

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