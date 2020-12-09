<?php
session_start();

if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

    echo '<h7> Welcome, ' . $_SESSION['name'] . '</h7>';

    if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
        echo '<h7> You have ' . $_SESSION['privilege'] . ' privilege </h7><br>';
    }
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
    $reqid = (int)$_GET['reqid'];

    $query = 'update requests
          set status = "inactive",
              result = "denied"
          where reqid='. $reqid;


    if (!$connection->query($query)) {
        echo("Error description: " . $connection->error);
    }


    $connection->close();
    echo "Request with ID: ".$reqid." has been successfully denied <br>";
    echo '<button onclick="self.close()">Close current popup</button>';
}
?>



<SCRIPT TYPE="text/javascript"> function popup(mylink, windowname)
    { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=600,height=400,scrollbars=yes'); return false; }
</SCRIPT>









