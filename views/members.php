<?php
//echo "Hello World\r\n";
//phpinfo();

$servername = "localhost";
$username = "adminer";
$password = "admin";
$dbname = "webpractice";

echo "<br>";
echo "Connection: ",$servername,"/",$username,"/",$password,"/",$dbname;
echo "<br>";


//create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//get results from database
$result = mysqli_query($connection,"SELECT * FROM member");
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
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";



?>