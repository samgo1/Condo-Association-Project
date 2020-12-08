
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="../index.php">Proceed to the forum CON general page</a>.';
} //connected

elseif (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {

    echo '<h7> Welcome, ' . $_SESSION['name'] . '</h7><br>';
    echo '<h7> You have ' . $_SESSION['privilege'] . ' privilege </h7><br>';



//echo $_SESSION['id'];

    include 'var.php';

//create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);


    $SQLcommand="SELECT 
co.condo_id, c.address, co.owner_id, m.name as owner_name
FROM condo_ownership co 
join condo c on co.condo_id=c.id 
join member m on co.owner_id = m.id";

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
                //echo '<td> <a href=\'./views/memberedit.php?ID='.$ID.'\'>'.$ID.'</td>';
                echo "<td> <A HREF=\"./views/memberedit.php?ID=" . $ID . "\" onClick=\" return popup(this, 'notes')\">" . $ID . "</A> </td>";
            } else {
                echo '<td>' . $row[$item] . '</td>';
            }
        }
        echo '</tr>';
    }
    echo "</table>";

}
else{echo 'You need to be an admin to view the condos page';}
    ?>
