<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {


        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "SELECT * FROM products WHERE id = ".$product_id;
        $result = $mysqli->query($sql_query);



    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];

            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $sql_query = "INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')";
            $query = $mysqli->query($sql_query);


        if($query){
          $newqty = $obj->qty - $quantity;

          $db = Database::getInstance();
              $mysqli = $db->getConnection();
              $sql_query = "UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id;
               

        


      }
    }
  }
}}

unset($_SESSION['cart']);
header("location:buysuccess.php");

?>
