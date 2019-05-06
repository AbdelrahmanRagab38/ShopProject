
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Diamond Shop</title>
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

$servername = "localhost";
$dbusername ="root";
$dbpassword ="";
$dbname ="shop";

$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$adress = isset($_POST['adress']) ? $_POST['adress'] : '';
$phoneno = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
$cpassword = isset($_POST['cpass']) ? $_POST['cpass'] : '';

if($fname && $adress && $phoneno && $email && $password && $cpassword)
{
	if(strlen($password)>3){
	
	if($password == $cpassword)
	{
		//CreatConnection
           $conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
           $name = mysqli_query($conn,"SELECT fname FROM users  WHERE fname='$fname'");
           $countname = mysqli_num_rows($name);
		   $remail="SELECT email FROM users WHERE email='$email'";
	       $result1=mysqli_query($conn,$remail);
           $checkemail =mysqli_num_rows($result1);
		   //checkConnection
              if($conn -> connect_error)
                       {
                               die("Connection Faild");
                       }
               if($countname!= 0)
                       {
	
	                     echo '<br><br><br><center>
                             <p><h1 style="color:#FFCC00"><strong>This User Name Is Already Exist! Try Another One.</strong></h1></p>
                             <img src="images/oops.png" width="320" alt="image03">
                             </center>';
                           header("Refresh:3; url=register.php");
                       }else
		  //checkemailavilability
			  if($checkemail!= 0)
                       {
	
	                     echo '<br><br><br><center>
                             <p><h1 style="color:#FFCC00"><strong>This E-mail Is Already Exist! Try Another One.</strong></h1></p>
                             <img src="images/oops.png" width="320" alt="image03">
                             </center>';
                           header("Refresh:3; url=register.php");
                       }

        else{
	    //To insert
			$passwordmd5=md5($password);//to encrypt the pass
            $sql="INSERT INTO users (fname,address,phonenum, email, password) VALUES('$fname','$adress', '$phoneno','$email','$passwordmd5')";

               if($conn->query($sql)== TRUE)
                       {
                               echo '<br><center>
                                    <p><h1 style="color:#FFCC00"><strong>Your Infromation Has Been Added, Thank You!</strong></h1></p>
                                    <img src="images/donee.png" width="320" alt="image03">
                                    </center>';
							   echo '<center><h2 style="color:#FFCC00"><a href="login.php">Login Now!</a></h2></center>';
                           header("Refresh:4; url=home.php");
                       }
                    else {
                               echo "ERROR in adding.";
                         }
				
			
			mysqli_close($conn);	
		   }
	} else 
	{
		echo '<br><br><br><center>
        <p><h1 style="color:#FFCC00"><strong>Your Password Do Not Match!</strong></h1></p>
        <img src="images/oops.png" width="320" alt="image03">
          </center>';
        header("Refresh:3; url=register.php");
	}
    }
	else 
	{
		echo '<br><br><br><center>
        <p><h1 style="color:#FFCC00"><strong>Your Password Is Too Short You Have To Type It Between 4-6!</strong></h1></p>
        <img src="images/oops.png" width="320" alt="image03">
          </center>';
        header("Refresh:3; url=register.php");
	}
	
}else 
   {
       
	echo '<br><br><br><center>
        <p><h1 style="color:#FFCC00"><strong>You Have To Complete The Form First!</strong></h1></p>
        <img src="images/oops.png" width="320" alt="image03">
          </center>';
      header("Refresh:3; url=register.php");
   }

?>

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

?>
