<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if($_SESSION["type"]!="admin") {
  header("location:home.php");
}

include 'config.php';

$_SESSION["products_id"] = array();
$_SESSION["products_id"] = $_REQUEST['quantity'];

  $db = Database::getInstance();
  $mysqli = $db->getConnection();
  $sql_query = "SELECT * from products order by id asc ";
  $result = $mysqli->query($sql_query);


$i=0;
$x=1;





if($result === FALSE){
  die(mysql_error());
}



if($result)
{
  while($obj = $result->fetch_object())

//foreach ( $result as $obj )

     {


    if(empty($_SESSION["products_id"][$i])) {
      $i++;
      $x++;
    }
    else {
      $newqty = $obj->qty + $_SESSION["products_id"][$i];
      if($newqty < 0) $newqty = 0; //So, Qty will not be in negative.

        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql_query = "UPDATE products SET qty =".$newqty." WHERE id =".$x;
        $result = $mysqli->query($sql_query);

        if($result === FALSE){
          die(mysql_error());
        }
      if($result)
        echo 'Data Updated';

      $i++;
      $x++;
    }
  }
}



header ("location:success.php");



?>
