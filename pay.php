<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


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
      <script src="js/vendor/modernizr.js"></script>
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
                      </div>
                    </div>
                  </div>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php

          echo '<p><h3>Payment</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $quantity) {

                  $db = Database::getInstance();
                  $mysqli = $db->getConnection();
                  $sql_query = "SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id;
                  $result = $mysqli->query($sql_query);



            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }



////////////////////////


interface payStrategy {
    public function pay($total);
}

class payByCC implements payStrategy {



    public function pay($total = 0) {
        ///////////////////
                 echo '<header>';
        echo   '<div class="limiter">';
        echo       ' <h3>You should pay with Credit Card because your total is more than 5000</h3>';
    echo       ' </div>';
  echo    '  </header>';
  echo     ' <div class="creditCardForm">';
  echo        '  <div class="heading">';
  echo        '      <h1>Confirm Purchase</h1>';
  echo       '   </div>';
    echo      '  <div class="payment">';
    echo         '   <form>';
      echo         '     <div class="form-group owner">';
          echo       '       <label for="owner">Owner</label>';
            echo      '      <input type="text" class="form-control" id="owner">';
            echo     '   </div>';
              echo   '   <div class="form-group CVV">';
                echo     '   <label for="cvv">CVV</label>';
              echo      '    <input type="text" class="form-control" id="cvv">';
          echo        '  </div>';
          echo       '  <div class="form-group" id="card-number-field">';
          echo       '       <label for="cardNumber">Card Number</label>';
            echo      '      <input type="text" class="form-control" id="cardNumber">';
            echo     '   </div>';
            echo      '  <div class="form-group" id="expiration-date">';
              echo      '    <label>Expiration Date</label>';
              echo       '   <select>';
                echo         '   <option value="01">January</option>';
                echo         '   <option value="02">February </option>';
                echo         '   <option value="03">March</option>';
                echo         '   <option value="04">April</option>';
                echo        '    <option value="05">May</option>';
                echo        '    <option value="06">June</option>';
                echo        '    <option value="07">July</option>';
                echo         '   <option value="08">August</option>';
                echo          '  <option value="09">September</option>';
                echo         '   <option value="10">October</option>';
                echo        '    <option value="11">November</option>';
                  echo      '    <option value="12">December</option>';
                    echo  '  </select>';
                  echo    '  <select>';
                  echo        '  <option value="16"> 2016</option>';
                  echo       '   <option value="17"> 2017</option>';
                  echo       '   <option value="18"> 2018</option>';
                  echo      '    <option value="19"> 2019</option>';
                  echo      '    <option value="20"> 2020</option>';
                  echo       '   <option value="21"> 2021</option>';
                  echo    '  </select>';
                  echo ' </div>';
                  echo ' <div class="form-group" id="credit_cards">';
                  echo   '   <img src="assets/images/visa.jpg" id="visa">';
                echo    '    <img src="assets/images/mastercard.jpg" id="mastercard">';
                echo    '    <img src="assets/images/amex.jpg" id="amex">';
                echo  '  </div>';
                echo  '  <div class="form-group" id="pay-now">';
                echo   ' </div>';
          echo    '  </form>';
        echo  '  </div>';
    echo   ' </div>';

    echo  '  <p class="examples-note">Here are some dummy credit card numbers and CVV codes so you can test out the form:</p>';

    echo  '  <div class="examples">';
      echo    '  <div class="table-responsive">';
          echo     ' <table class="table table-hover">';
          echo        '  <thead>';
              echo        '  <tr>';
                echo         '   <th>Type</th>';
                  echo       '   <th>Card Number</th>';
                  echo     '     <th>Security Code</th>';
                  echo  '    </tr>';
                  echo ' </thead>';
                  echo  '<tbody>';
                  echo     ' <tr>';
                  echo        '  <td>Visa</td>';
                  echo       '   <td>4716108999716531</td>';
                    echo     '   <td>257</td>';
                  echo    '  </tr>';
                  echo     ' <tr>';
                    echo     '   <td>Master Card</td>';
                    echo      '  <td>5281037048916168</td>';
                    echo    '    <td>043</td>';
                    echo   ' </tr>';
                  echo     ' <tr>';
                  echo         ' <td>American Express</td>';
                  echo       '   <td>342498818630298</td>';
                echo         '   <td>3156</td>';
                echo     '   </tr>';
                echo   ' </tbody>';
            echo   ' </table>';
          echo ' </div>';
    echo   ' </div>';
      echo ' </div>';
    echo   ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
      echo ' <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
      echo ' <script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>';
      echo ' <script src="assets/js/script.js"></script>';
      echo ' </body>';


        //////////////////////////////
    }

}

class payByPayPal implements payStrategy {

    private $payPalEmail = '';

    public function pay($total = 0) {
      echo       ' <h3> You can pay by dliverd CASH  because your total is less than 5000</h3>';


    echo       '  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
    echo       '  <script>';
    echo       '  $(document).ready(function(){';
    echo       '      $("button").click(function(){';
    echo       '          $("form").toggle();';
    echo       '      });';
    echo       '  });';
    echo       '  </script>';
    echo       '  </head>';
    echo       '  <body>';

    echo       '  <button>No Thanks , I prefer pay with Credit Card</button>';

    ///////////////////

    echo   '<div class="limiter">';
echo       ' </div>';
echo    '  </header>';
echo     ' <div class="creditCardForm">';
echo        '  <div class="heading">';
echo       '   </div>';
echo      '  <div class="payment">';
echo         '   <form style="display:none;">';
  echo         '     <div class="form-group owner">';
      echo       '       <label for="owner">Owner</label>';
        echo      '      <input type="text" class="form-control" id="owner">';
        echo     '   </div>';
          echo   '   <div class="form-group CVV">';
            echo     '   <label for="cvv">CVV</label>';
          echo      '    <input type="text" class="form-control" id="cvv">';
      echo        '  </div>';
      echo       '  <div class="form-group" id="card-number-field">';
      echo       '       <label for="cardNumber">Card Number</label>';
        echo      '      <input type="text" class="form-control" id="cardNumber">';
        echo     '   </div>';
        echo      '  <div class="form-group" id="expiration-date">';
          echo      '    <label>Expiration Date</label>';
          echo       '   <select>';
            echo         '   <option value="01">January</option>';
            echo         '   <option value="02">February </option>';
            echo         '   <option value="03">March</option>';
            echo         '   <option value="04">April</option>';
            echo        '    <option value="05">May</option>';
            echo        '    <option value="06">June</option>';
            echo        '    <option value="07">July</option>';
            echo         '   <option value="08">August</option>';
            echo          '  <option value="09">September</option>';
            echo         '   <option value="10">October</option>';
            echo        '    <option value="11">November</option>';
              echo      '    <option value="12">December</option>';
                echo  '  </select>';
              echo    '  <select>';
              echo        '  <option value="16"> 2016</option>';
              echo       '   <option value="17"> 2017</option>';
              echo       '   <option value="18"> 2018</option>';
              echo      '    <option value="19"> 2019</option>';
              echo      '    <option value="20"> 2020</option>';
              echo       '   <option value="21"> 2021</option>';
              echo    '  </select>';
              echo ' </div>';
              echo ' <div class="form-group" id="credit_cards">';
              echo   '   <img src="assets/images/visa.jpg" id="visa">';
            echo    '    <img src="assets/images/mastercard.jpg" id="mastercard">';
            echo    '    <img src="assets/images/amex.jpg" id="amex">';
            echo  '  </div>';
            echo  '  <div class="form-group" id="pay-now">';
            echo   ' </div>';
      echo    '  </form>';
    echo  '  </div>';
echo   ' </div>';



echo   ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
  echo ' <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
  echo ' <script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>';
  echo ' <script src="assets/js/script.js"></script>';
  echo ' </body>';


    //////////////////////////////


    }

}

class shoppingCart {

    public $total = 0;

    public function __construct($total = 0) {
        $this->total = $total;
    }

    public function gettotal() {
        return $this->total;
    }

    public function settotal($total = 0) {
        $this->total = $total;
    }

    public function paytotal() {
        if($this->total >= 5000) {
            $payment = new payByCC();
        } else {
            $payment = new payByPayPal();
        }

        $payment->pay($this->total);
    }
}


$cart = new shoppingCart($total);


//////////////////////


          echo '<tr>';
          echo '<td colspan="3" align="right">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
          if(isset($_SESSION['username'])) {
            $cart->paytotal();
            echo '<a href="orders-update.php"><button style="float:right;">Continue Payement</button></a>';
          }

          else {
            echo '<a href="login.php"><button style="float:right;">Login</button></a>';
          }

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }

        else {
          echo "You have no items in your shopping cart.";
        }




          echo '</div>';
          echo '</div>';
          ?>



    <div class="row" style="margin-top:10px;">
      <div class="small-12">




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
