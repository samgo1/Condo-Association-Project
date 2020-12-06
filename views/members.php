<SCRIPT TYPE="text/javascript"> function popup(mylink, windowname)
    { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=600,height=400,scrollbars=yes'); return false; }
</SCRIPT>
<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="/Condo-Association-Project/index.php">Proceed to the forum overview</a>.';
}



//connected
else
    {

    echo '<h2> Welcome, '. $_SESSION['name'].'</h2>' ;

    if(isset($_SESSION["privilege"]) && $_SESSION['privilege']==='admin'){
        echo '<h> your have '. $_SESSION['privilege'] .' privilege </h3>';
}

}


echo '<A HREF="./views/membercreate.php?" onClick=" return popup(this, \'notes\')">Click here to add a new user</A>'
include 'var.php';
//create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}
//echo '<a href="membercreate.php">Click here to add new user</a>';

$SQLcommand = "SELECT CONCAT('ID=',id) as ID, name, status, civic_address, email, privilege, login_username, login_password from member";
//$SQLcommand = "SELECT id , name, status, civic_address, email from member";
//get results from database
$result = mysqli_query($connection,$SQLcommand);
//$result = mysqli_query($connection,"SELECT id,name,status,civic_address FROM member");

$all_property = array();  //declare an array for saving property



//showing property

echo '<table class="data-table" border="2">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        if (substr($row[$item], 0, 3) == 'ID=')
        {   $ID = substr($row[$item], 3);
            //echo '<td> <a href=\'./views/memberedit.php?ID='.$ID.'\'>'.$ID.'</td>';
            echo "<td> <A HREF=\"./views/memberedit.php?ID=".$ID."\" onClick=\" return popup(this, 'notes')\">".$ID."</A> </td>";
        }

        else { echo '<td>' . $row[$item] . '</td>'; }
    }
    echo '</tr>';
}
echo "</table>";



?>