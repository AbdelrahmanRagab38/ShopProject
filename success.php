<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

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




    <div class="container" style="margin-top:10px;">
      <div class="small-12">
          
          <center>
        <p><h1 style="color:#FFCC00">Successfully Updated. Thank You!</h1></p>
          <?php header("Refresh:3; url=home.php");?> 
        <img src="images/donee.png" width="320" alt="image03">
          </center>
       
        
    
        
        
        <br><br><br>
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Tshtiry Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
