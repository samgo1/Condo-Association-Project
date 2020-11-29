<?php
include 'var.php';
//create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//$ud_ID = (int)$_POST["ID"];
$ud_name = $_POST["ud_name"];
$ud_civic_address = $_POST["ud_civic_address"];
$ud_email = $_POST["ud_email"];
$ud_login_username = $_POST["ud_login_username"];
$ud_login_password = $_POST["ud_login_password"];

echo "Name: ".$ud_name."<br>";


$query="INSERT INTO member (name, civic_address, email, login_username, login_password)
VALUES('$ud_name','$ud_civic_address','$ud_email','$ud_login_username','$ud_login_password')";

mysqli_query($connection,$query)or die(mysqli_error());
if($connection->affected_rows>=1){
    echo "<p>($ud_name) Record Updated<p>";
}else{
    echo "<p>($ud_name) Not Updated<p>";
}
?>
<a href="members.php">Click here to go back to the members page</a>



