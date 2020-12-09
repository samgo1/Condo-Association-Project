<?php
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
	echo'<h3> please login first to submit emails!';
}
else
{//user logged in
	include_once '../views/var.php';
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
} 

$reciever_id=$_SESSION['id']; 

//$result = mysqli_query($conn,"SELECT 'name','message_content','date_time' FROM mailbox INNER JOIN member ON sender_id=id");

$query = "SELECT * FROM mailbox mb JOIN member m ON mb.sender_id=m.id WHERE receiver_id=$reciever_id ORDER BY date_time DESC";

$result = $conn -> query($query);

//Store all the messages in an array.

$rows = [];

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	  array_push($rows, $row);
	}
} 
else {
	echo "0 results";
}
  $conn->close();

foreach($rows as &$mail){

	showMailItem($mail['name'], $mail['sender_id'], $mail['date_time'], $mail['message_content']);
}


function showMailItem($senderName, $senderID, $dateSent, $content){

    echo "<div class=\"inboxItem\" onclick=\"showMessageItem('$senderName', '$senderID', '$dateSent', '$content')\">
    <div name=\"sender\" class=\"sender\">$senderName $senderID</div>
    <div name=\"subject\" class=\"subject\">$dateSent</div></div>";
}
?>
