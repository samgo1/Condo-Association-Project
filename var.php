<?php

$servername = "localhost";
$username = "adminer";
$password = "admin";
$dbname = "webpractice";

echo "<br>";
echo "Connection: ",$servername,"/",$username,"/",$password,"/",$dbname;
echo "<br>";

//create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

?>