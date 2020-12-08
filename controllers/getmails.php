<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
	echo'<h3> please login first to submit emails!';
}
else
{//user logged in
	include_once '..\var.php';
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
} 

$reciever_id=$_SESSION['id']; 

$result = mysqli_query($conn,"SELECT name,message_content,date_time FROM mailbox INNER JOIN member ON sender_id=id");


$all_property = array(); 	
while ($property = mysqli_fetch_field($result)) {

    array_push($all_property, $property->name);  //save those to array
}

//echo $result;

echo $reciever_id;

?>
