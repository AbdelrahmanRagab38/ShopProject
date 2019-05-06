<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset=utf-8>
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
 <a href="home.php" class="brand">
                        <img src="images/tshtiry.png" style="height:auto; width: 120px;" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
<br>
<br>
<br>
<br>
         
         <center>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" align="center" >
                <!-- Start customer Field -->
                <div class="form-group form-group-lg" align="center">
                    <label ><h2>Customer</h2> </label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="username"
								class="form-control"
								required="required"
								placeholder="Name of Customer" />
						</div>
					</div>
					<!-- End customer Field -->
                 <!-- Start description Field -->
                <div class="form-group form-group-lg" align="center">
                    <label ><h2>Description</h2> </label>
						<div class="col-sm-10 col-md-6">
							<input
								type="text"
								name="des"
								class="form-control"
								required="required"
								placeholder="Description of The Photo" />
						</div>
					</div>
					<!-- End description Field -->
        		<!-- Start Image Field -->
					<div class="form-group form-group-lg" align="center" >
						<label ><h2>Suggested Photo: </h2></label>
						<div class="col-sm-10 col-md-6">
							<input
								type="file"
								name="avatar"
								class="form-control"
								required="required"/>
                            <p><a ><input type="submit" name="submit" value="     send     " style="clear:both; background: #ffcc00; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>
						</div>
                </div>
                                            </form></center>
					<!-- End Image Field -->
                <?php 
                
                $msg = null;
	       if(isset($_POST['submit'])){
		
		$name = $_POST['username'];
		$des = $_POST['des'];

		
		$file = $_FILES['avatar'];

			$fileName = $file['name'];
			$fileTmpName = $file['tmp_name'];
			$fileSize = $file['size'];
			$fileError = $file['error'];
			$fileType = $file['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = 'uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
						//header("Location: add.php?uploadsuccess");
						
						$arr = array("name"=>"name", "des"=>"des", "image"=>"$fileDestination");    
						echo "<div class='alert alert-danger'>Image added successfully.Redirecting...</div>";
                        header("Refresh:3; url=products.php");
					} else {
						echo "<div class='alert alert-danger'>Your file is too big!</div>";
					}
				} else {
					echo "<div class='alert alert-danger'>There was an error uploading your file!</div>";
				}
			} else {
				echo "<div class='alert alert-danger'>You cannot upload files of this type!</div>";
			}

	}
                ?>
        
        </div>
        <br>
    <br>
    
        <div class="container">
                    <div class="span9 center contact-info">
                        <p>To Reach Our Team Please Send Here!</p>
                        <p class="info-mail" style="color:#ffcc00;">mirnamourad-fci@hotmail.com</p>
                    
                    </div>
    
       <?php include 'footer.php'; ?>
       
    </body>
</html>