<!DOCTYPE html>
<html lang="en">

    <head>
    </head>

    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="home.php" class="brand">
                        <img src="images/tshtiry.png" style="height:auto; width: 120px;" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                          <li><a href="home.php">HOME</a></li>
                          <li><a href="#about">About</a></li>
                          <li><a href="products.php">Exam Cell Automation</a></li>
                          <li><a href="#contact">Feedback</a></li>
                          <?php

                          if(isset($_SESSION['username'])){
                            echo '<li><a href="account.php">My Account</a></li>';
                            echo '<li><a href="logout.php">Log Out</a></li>';
                          }
                          else{
                            echo '<li><a href="login.php">Log In</a></li>';
                            echo '<li><a href="register.php">Register</a></li>';
                          }
                          ?>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        </body>
        </html>