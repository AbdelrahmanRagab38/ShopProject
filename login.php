<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

        header("location:index.php");
}

?>
<!doctype html>
<html class="no-js" lang="en">
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
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
      <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/logo1.png" >
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
      <!-- start main navigation -->
     <div class="navbar">
            <?php include'navegation.php';?>

    <form method="POST" action="verify.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">
            <p></p>
         <center> <h2 style="color:#FFCC00"><strong>Login Now!</strong></h2></center>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="color:white">Username</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Type Your Username" name="username">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline" style="color:white">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd">
            </div>
          </div>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Login" style="background: #000; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #000; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;"><br><br>
              <center><a href='register.php' style="color:#FFCC00"> Don't Have Account Yet? Register Now!</a></center>
               
            </div>
          </div>
        </div>
      </div>
        <br><br><br><br><br><br><br><br>
    </form>
                 
    <?php include'footer.php';?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
 </div>
    </body>
      </html>
