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
/*
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

}*/
<?php

$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'conproject';

//$conn = mysqli_connect($server, $username,$password, $database);


$result = mysqli_query($conn,"SELECT name,message_content,date_time FROM mailbox INNER JOIN member ON sender_id=id");

$all_property = array(); 	
while ($property = mysqli_fetch_field($result)) {
    array_push($all_property, $property->name);  //save those to array
}

//showing all data

$result_name='';
$result_msg='';
$result_date='';
getemail(0,$result_name,$result_msg,$result_date,$all_property,$result);

function getemail ($email_number,&$result_name,&$result_msg,&$result_date,&$all_property,&$result){
	while ($email_number>=0) {
		$row = mysqli_fetch_array($result);
		echo "<div>";
		foreach ($all_property as $item) {
			if($item=='name'){
				$result_name=$row[$item];

			}
			if($item=='message_content')
				$result_msg=$row[$item];
			if($item=='date_time')
				$result_date=$row[$item];
		}
		$email_number--;
	}
}

echo $result_name.' sent you : '.$result_msg.' on : '.$result_date;



