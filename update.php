<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_POST["fname"];
$address = $_POST["address"];
$phonenum = $_POST["phonenum"];
$email = $_POST["email"];
$password =md5 ($_POST["password"]);


if($fname!=""){

  $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = 'UPDATE users SET fname ="'. $fname .'" WHERE id ='.$_SESSION['id'];
    $result = $mysqli->query($sql_query);


  if($result){
  }
}

if($address!=""){

  $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = 'UPDATE users SET address ="'. $address .'" WHERE id ='.$_SESSION['id'];
    $result = $mysqli->query($sql_query);

  if($result){
  }
}

if($phonenum!=""){

  $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = 'UPDATE users SET phonenum ="'. $phonenum .'" WHERE id ='.$_SESSION['id'];
    $result = $mysqli->query($sql_query);


  if($result){
  }
}

if($email!=""){

  $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $sql_query = 'UPDATE users SET email ="'. $email .'" WHERE id ='.$_SESSION['id'];
    $result = $mysqli->query($sql_query);


  if($result){
  }
}

if($password!=""){
  $db = Database::getInstance();
    $mysqli = $db->getConnection();
  $result = $mysqli->query('UPDATE users SET password ="'. $password .'" WHERE id ='.$_SESSION['id']);
  if($result){
  }
}





header("location:success.php");


?>
