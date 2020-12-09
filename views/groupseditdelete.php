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

    $GID = (int)$_GET['GID'];
    $UID = (int)$_GET['UID'];


    echo "You have removed user with ID: $UID from group: $GID<br>";


    $query = "delete from group_membership where group_id=$GID and member_id=$UID";

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
    echo '<td><a  href=groupsedit.php?ID=' . $GID . '>Click here to further modify the group</a></td>';
    echo '<button onclick="self.close()">Click here to exit popup</button>';
}
?>

