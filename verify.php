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
                          <li><a href="#about">About</a></li>
                          <li><a href="products.php">Products</a></li>
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

<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = md5($_POST["pwd"]);
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");


  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $sql_query = "SELECT id,email,password,fname,type from users order by id asc";
  $result = $mysqli->query($sql_query);


if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->fname === $username && $obj->password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      header("location:home.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<center><p><h1 style="color:#FFCC00" ><strong>Invalid Login! Redirecting...</strong></h1></p>
  <img src="images/oops.png" alt="opps" width="320"></center>';
  header("Refresh: 3; url=login.php");
}

echo '<br> <br><br>';
include 'footer.php';
?>

      </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
