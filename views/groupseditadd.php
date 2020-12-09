<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
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

    $GID = (int)$_GET['GID'];
    $UID = (int)$_GET['UID'];


    echo "You have added user with ID: $UID into group: $GID<br>";


    $query = "insert into group_membership (group_id,member_id) values($GID,$UID)";

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

