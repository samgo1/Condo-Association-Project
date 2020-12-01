<?php

$server = 'localhost';
$username   = 'adminer';
$password   = 'admin';
$database   = 'webpractice';
 
//$conn = mysqli_connect($server, $username,$password, $database);

$conn = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 