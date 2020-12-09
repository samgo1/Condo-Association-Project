<?php
session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

    echo '<h6> Welcome, ' . $_SESSION['name'] . '</h6><br>';

//echo $_SESSION['id'];


    include 'var.php';
//create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
    if (mysqli_connect_errno()) {
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

    echo "Name: " . $ud_name . "<br>";


    $query = "INSERT INTO member (name, civic_address, email, login_username, login_password)
VALUES('$ud_name','$ud_civic_address','$ud_email','$ud_login_username','$ud_login_password')";

//mysqli_query($connection,$query)or die(mysqli_error());
//if($connection->affected_rows>=1){
//    echo "<p>($ud_name) Record Updated<p>";
//}else{
//    echo "<p>($ud_name) Not Updated<p>";
//}
    if (!$connection->query($query)) {
        echo("Error description: " . $connection->error);
    }

    $connection->close();
    echo '<button onclick="self.close()">Close</button>';
}
?>
<button onclick="self.close()">Close</button>



