<?php

if (!defined('INCLUDED_PAGE')) {
  header("Location: ../404");
  exit;
}else{
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbName = "win4";
  
  $conn = new mysqli($servername, $username, $password, $dbName);
  $conn->set_charset('utf8mb4');
  if ($conn->connect_error) {
    $errMess = "Connection failed " . mysqli_connect_error();
    header("Location: ../error?errorMesssage=$errMess");
    $conn->close();
    exit;
  }
}
