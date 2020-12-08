<SCRIPT TYPE="text/javascript"> function popup(mylink, windowname)
    { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=600,height=400,scrollbars=yes'); return false; }
</SCRIPT>
<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="/fp/index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

    echo '<h2> Welcome, ' . $_SESSION['name'] . '</h2>';

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
    $GID= (int)$_GET['ID'];
    $UID = $_SESSION["id"];
    $query = "insert into requests (user_ID,group_ID) values (".$UID.",".$GID.")";


    if (!$connection->query($query)) {
        echo("Error description: " . $connection->error);
    }


    $connection->close();
    echo "Your request to join group: ".$GID." has been successfully sent <br>";
    echo '<button onclick="self.close()">Close current popup</button>';
}
?>