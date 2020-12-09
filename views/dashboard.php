<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
include_once 'var.php';
$conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
//header('Location: https://192.168.1.16/fp/login/includes/loginbtn.inc.php');
include '../login/includes/loginbtn.inc.php';


}//connected
else {

    echo '<h2> Welcome, ' . $_SESSION['name'] . '</h2>';

    if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
        echo '<h> your have ' . $_SESSION['privilege'] . ' privilege </h3>';
    }

    if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] == 'admin') {
    }
}
?>