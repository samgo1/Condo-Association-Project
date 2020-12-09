<SCRIPT TYPE="text/javascript"> function popup(mylink, windowname)
    { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=600,height=600,scrollbars=yes'); return false; }
</SCRIPT>



<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page for login</a>.';
}



//connected
else {

    if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
        echo '<h6> You have ' . $_SESSION['privilege'] . ' privilege </h6><br>';
    }
    //echo $_SESSION['id'];

    if ($_SESSION["privilege"]=="admin"){
        echo '<A HREF="./views/groupcreate.php?" onClick=" return popup(this, \'notes\')">Click here to add a new group</A>';
    }
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
//echo '<a href="membercreate.php">Click here to add new user</a>';

//$SQLcommand = "select gm.group_id, g.`name` as group_name,g.`owner`as owner_ID,m1.`name` as group_owner, 'del'
//from group_membership gm
//join `group` g on gm.group_id = g.id
//join `member` m1 on g.`owner`= m1.id";

    if ($_SESSION["privilege"]=="admin") { $SQLcommand = 'SELECT CONCAT(\'ID=\',g.id) as group_ID, g.name as group_name, g.owner as group_owner_ID, m.name as owner_name, CONCAT(\'delgr=\',g.id) as del
    from `group` g join `member` m on g.owner=m.id';}

    if ($_SESSION["privilege"]!="admin") { $SQLcommand= "SELECT  CONCAT('ID=',g.id) as group_ID, g.name as group_name, g.owner as group_owner_ID, m.name as owner_name
       from `group` g join `member` m on g.owner=m.id where g.owner=".$_SESSION['id']."
       union
       SELECT CONCAT('RID=',g.id) as group_ID, g.name as group_name, g.owner as group_owner_ID, m.name as owner_name
       from `group` g join `member` m on g.owner=m.id where g.owner!=".$_SESSION['id'];}






//$SQLcommand = "SELECT id , name, status, civic_address, email from member";
//get results from database
    $result = mysqli_query($connection, $SQLcommand);
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
            if (substr($row[$item], 0, 3) == 'ID=') {
                $ID = substr($row[$item], 3);
                echo "<td> <A HREF=\"./views/groupsedit.php?ID=" . $ID . "\" onClick=\" return popup(this, 'notes')\" title='Edit group'>" . $ID . "</A> </td>";
            }
            elseif(substr($row[$item], 0, 4) == 'RID='){
                    $ID = substr($row[$item], 4);
                    echo "<td> <A HREF=\"./views/groupsrequest.php?ID=" . $ID . "\" onClick=\" return popup(this, 'notes')\" title='Request to join group'>" . $ID . "</A> </td>";
            }
            elseif (substr($row[$item], 0, 6) == 'delgr=' ) {
                $ID = substr($row[$item], 6);
                echo "<td> <A HREF=\"./views/groupdelete.php?ID=" . $ID . "\" onClick=\" return popup(this, 'notes')\" title='Delete Group'>" . "del" . "</A> </td>";
            }
            else   {echo '<td>' . $row[$item] . '</td>';}
        }
        echo '</tr>';
    }
echo "</table>";


}
?>