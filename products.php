<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
 $connect = mysqli_connect("localhost", "root", "", "shop");  

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
      
        <link rel="shortcut icon" href="images/logo1.png" >
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <script src="js/vendor/modernizr.js"></script>
  <!--</head>
<body>-->
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
                      </div>
                    </div>
                  

</div>



</head>
    <body>
    <h1><strong>Products</strong></h1>
        <center>
<form method="GET" action="products.php">
    
<input type="text" name="search"style="width:700px;">
    <p><a><input type="submit" value="Search Products" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" name="submit"/></a>
   <a href="products.php"><input type="button" value="Back To Poducts" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" name="submit"/></a>    <a href="uploadphoto.php"><input type="button" value="Any Suggestion Photo!" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" name="submit"/></a> </p>


<hr/>

<?PHP

if(isset($_REQUEST['submit']))//isset  that the button was clicked
{
    $product_id = array();
	$search=$_GET['search'];
	$terms=explode(" ",$search);//to find every word in the search text and will make an array 
	$query="SELECT * FROM products WHERE ";
	$i=0;
	foreach($terms as $each)
	{
		$i++;
		if($i==1)
		{
		  $query .="product_name LIKE '%$each%' ";
		}else
		{
			$query .="OR product_name LIKE '%$each%' ";
		}
	}//using foreach bec we using dynamic values
  $q=mysqli_query($connect,$query);
  $num =mysqli_num_rows($q);

if($num >0 && $search !="")
{
	echo "<h1>$num Reult(s)found for <b>$search</b>!<h1/>";
      
	while($row=mysqli_fetch_assoc($q))
	{
        echo '<div class="large-4 columns">';
              echo '<center><img src="'.$row['product_img_name'].'" class="img-responsive" width="250px" /></center>';
              echo '<p style="font-size:100%;color:#ffc500;text-align:center;background-color:#000;font-family:tahoma">'.$row['product_name'].'</p>';
              echo '<p style=color:#000;><strong>Product Code</strong>: '.$row['product_code'].'</p>';
              echo '<p style=color:#000;><strong>Description</strong>: '.$row['product_desc'].'</p>';
              echo '<p style=color:#000;><strong>Units Available</strong>: '.$row['qty'].'</p>';
              echo '<p style=color:#000;><strong>Price (Per Unit)</strong>: '.$row['price'].'</p>';   
              echo '</div>';
              
              $i++;
            }
          }

         $_SESSION['product_id'] = $product_id;
          echo '</div>';
          echo '</div>';
		      
	}

else
{ ?>
	</form>
</center> 
        
 <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $sql_query = "SELECT * FROM products";
            $result = $mysqli->query($sql_query);

          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<center><img src="'.$obj->product_img_name.'" class="img-responsive" width="250px" /></center>';
              echo '<p style="font-size:160%;color:#ffc500;text-align:center;background-color:#000;font-family:tahoma">'.$obj->product_name.'</p>';
              echo '<p style=color:#000;><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p style=color:#000;><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p style=color:#000;><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p style=color:#000;><strong>Price (Per Unit)</strong>: '.$obj->price.'</p>';



              if($obj->qty > 0){
                  
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }
          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
        
   <?php

}
 mysqli_close($connect);
	

?>




     
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; Diamond Shop. All Rights Reserved.</p>
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