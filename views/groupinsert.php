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

//$ud_ID = (int)$_POST["ID"];
    $ud_groupname = $_POST["ud_groupname"];
    $ud_ownerid = $_POST["ud_ownerid"];

    echo "Successfully created a group<br>";
    echo "Name of the created group is: " . $ud_groupname . "<br>";
    echo "ID of the group owner is: " . $ud_ownerid . "<br>";

    $query = "insert into `group` (name, owner) values('$ud_groupname',$ud_ownerid)  ";


    if (!$connection->query($query)) {
        echo("Error description: " . $connection->error);
    }

    $connection->close();
    echo '<button onclick="self.close()">Close</button>';
}
?>
