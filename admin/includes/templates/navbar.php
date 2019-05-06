
<html>
 <head>
        <link rel="shortcut icon" href="images/logo1.png" >
    </head>
    <body>
<nav class="navbar navbar-inverse">
    
  <div class="container">
    <div class="navbar-header">
     
        <a href="../home.php" class="brand">
            <img src="images/tshtiry.png" style="height:auto; width: 120px;" alt="Logo" /></a>
    </div>
    <div class="collapse navbar-collapse pull-right" id="app-nav">
      <ul class="nav navbar-nav">
        <li><a href="members.php">USERS</a></li>
        <li><a href="items.php">PRODUCTS</a></li>
        <li><a href="order.php">ORDERS</a></li>
                  <?php

                              if(isset($_SESSION['username'])){
                                echo '<li><a href="../account.php">MY ACCOUNT</a></li>';
                                echo '<li><a href="../logout.php">LOG OUT</a></li>';
                              }
                              else{
                                echo '<li><a href="../login.php">LOG IN</a></li>';
                                echo '<li><a href="../register.php">REGISTER</a></li>';
                              }
                              ?>
      </ul>
    </div>
  </div>
</nav></body>
    </html>