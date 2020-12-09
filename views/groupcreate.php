
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

echo '<form action="groupinsert.php" method="post">
    Create a new Group<br>
    Group name <input type="text" name="ud_groupname" value="Insert group name"><br>
    Insert group owner ID: <input type="text" name="ud_ownerid" value="insert the owner id"><br>

    <input type="Submit">
</form>';
}
?>