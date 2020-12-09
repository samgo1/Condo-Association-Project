<?php
session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

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


//get reqid from prvious page
    $reqid = (int)$_GET['reqid'];

//define queries
    $query1 = 'insert into group_membership (group_id,member_id) 
values((select group_ID from requests where reqid='.$reqid.'),(select user_ID from requests where reqid='. $reqid.'))';


    $query2 = 'update requests
          set status="inactive",
              result = "accepted"
          where reqid='. $reqid;



//run queries
    if (!$connection->query($query1)) {
        echo("Error description: " . $connection->error."<br>");
    }
    if (!$connection->query($query2)) {
        echo("Error description: " . $connection->error."<br>");
    }


    $connection->close();
    echo "Request with ID: ".$reqid." has been successfully added<br>";
    echo '<button onclick="self.close()">Close current popup</button>';
}
?>
<SCRIPT TYPE="text/javascript"> function popup(mylink, windowname)
  { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=600,height=400,scrollbars=yes'); return false; }
</SCRIPT>
