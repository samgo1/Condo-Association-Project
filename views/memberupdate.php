<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

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

    $ud_ID = (int)$_POST["ID"];
    $ud_name = $_POST["ud_name"];
    $ud_status = $_POST["ud_status"];
    $ud_civic_address = $_POST["ud_civic_address"];
    $ud_email = $_POST["ud_email"];
    $ud_privilege = $_POST["ud_privilege"];
    $ud_login_username = $_POST["ud_login_username"];
    $ud_login_password = $_POST["ud_login_password"];

    echo "ID: " . $ud_ID . "  Name: " . $ud_name . "<br>";

    $query = "UPDATE member
        SET name = '$ud_name', 
            status = '$ud_status', 
            civic_address = '$ud_civic_address', 
            email = '$ud_email',
            privilege = '$ud_privilege',
            login_username = '$ud_login_username', 
            login_password = '$ud_login_password'    
            WHERE ID=$ud_ID";


    mysqli_query($connection, $query) or die(mysqli_error($connection));
    if ($connection->affected_rows >= 1) {
        echo "<p>($ud_ID) Record Updated<p>";
    } else {
        echo "<p>($ud_ID) Not Updated<p>";
    }
    echo '<button onclick="self.close()">Close</button>';

}
?>






