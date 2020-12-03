<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
	echo'<h3> please login first to submit emails!';
}
else{//user logged in
	include_once '..\var.php';
    $conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 
//get results from database
$reciever_id=$_SESSION['id'] ;//user login in is the receiver
$result = mysqli_query($conn,"SELECT sender_id,date_time,message_content FROM mailbox WHERE receiver_id=$reciever_id ");
if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while loading the messages. Please try again later.';
            echo '<a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
            
        }
        else
        {
        	echo '<h1>'.$reciever_id.'</h1> <br>';
        	
            $all_property = array(); 
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
        }

}