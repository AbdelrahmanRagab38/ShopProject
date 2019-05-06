<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=home.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teshtiry Shop</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->

         <link rel="shortcut icon" href="images/logo1.png" >
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
                          <li><a href="products.php">Products</a></li>
                          <li><a href="cart.php">View Cart</a></li>
                          <li><a href="orders.php">My Orders</a></li>

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
<center>
<h1 style="color:#FFCC00"><strong>Updating Information </strong></h1>
     <form method="POST" action="update.php" style="margin-top:30px;">
      <div class="container">
        <div class="small-12">

          <div class="container">
            <div class="small-3 columns">
              <label for="right-label" class="right inline">Name</label>
            </div>
            <div class="small-8 columns end">
              <?php
                  $db = Database::getInstance();
                  $mysqli = $db->getConnection();
                  $sql_query = 'SELECT * FROM users WHERE id='.$_SESSION['id'];
                  $result = $mysqli->query($sql_query);

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="container">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Address</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->address. '" name="address">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="container">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Phone Number</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->phonenum. '" name="phonenum">';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="container">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">E-mail</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="email" id="right-label" placeholder="'. $obj->email. '" name="email">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="container">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Password</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="password" id="right-label" placeholder="'. $obj->password. '" name="password">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="container">';
                  echo '<div class="small-3 columns">';
                  echo '</div>';

                  echo '<div class="small-8 columns end">';


                  echo '</div>';
                  echo '</div>';
              }

          ?>
                <p></p>
 <div class="container">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
</center>

<p></p>
    <div class="footer">
        <p>&copy; Copyright Tshtiry Shop</p>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>