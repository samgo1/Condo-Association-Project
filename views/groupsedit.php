<?php
session_start();
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
//get results from database
    $GID = (int)$_GET['ID'];

    $SQLcommand = 'select * from (select m.id as member_ID, m.`name` as member_name, concat("DelUser=",m.id) as `action`
from `member` m left join (select * from group_membership where group_id=' . $GID . ') gm
on m.id = gm.member_id  where gm.group_id is NOT NULL  order by m.`name`) b
UNION
select * from (select m.id as member_ID, m.`name` as member_name,concat("AddUser=",m.id) as `action`
from `member` m left join (select * from group_membership where group_id=' . $GID . ') gm
on m.id = gm.member_id  where gm.group_id is NULL  order by m.`name`) a';

//$SQLcommand = "SELECT id , name, status, civic_address, email from member";
//get results from database
    $result = mysqli_query($connection, $SQLcommand);
//$result = mysqli_query($connection,"SELECT id,name,status,civic_address FROM member");

    $all_property = array();  //declare an array for saving property

    echo "You are currently modifying the data for group: " . $GID . "<br>";

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
            if (substr($row[$item], 0, 8) == 'DelUser=') {
                $UID = substr($row[$item], 8);
                //echo "<td> <A HREF=\"./views/groupseditdelete.php?GID=".$GID."&UID=".$UID."\" onClick=\" return popup(this, 'notes')\">Delete user with ID: ".$UID."</A> </td>";
                echo '<td><a href=groupseditdelete.php?GID=' . $GID . '&UID=' . $UID . '>Click here to remove this user</a></td>';
            } else {
                if (substr($row[$item], 0, 8) == 'AddUser=') {
                    $UID = substr($row[$item], 8);

                    //echo "<td> <A HREF=\"./views/groupseditdelete.php?GID=".$GID."&UID=".$UID."\" onClick=\" return popup(this, 'notes')\">Add user with ID: ".$UID."</A> </td>";
                    echo '<td><a href=groupseditadd.php?GID=' . $GID . '&UID=' . $UID . '>Click here to add this user</a></td>';
                } else {
                    echo '<td>' . $row[$item] . '</td>';
                }
            }
        }
        echo '</tr>';
    }
    echo "</table>";


}
?>














