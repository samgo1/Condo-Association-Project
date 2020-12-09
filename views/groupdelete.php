<?php
session_start();
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
//get results from database
    $GID = (int)$_GET['ID'];

    $query1 = "delete from group_membership where group_id = $GID";

    $query2 = "delete from `group` where id = $GID";

    if (!$connection->query($query1)) {
        echo("Error description: " . $connection->error);
    }

    if (!$connection->query($query2)) {
        echo("Error description: " . $connection->error);
    }
    $connection->close();
    echo "Group " . $GID . " has been successfully deleted <br>";
    echo '<button onclick="self.close()">Close courent popup</button>';

}
?>

