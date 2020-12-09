<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo'<h3> please login first to submit emails!';
}
else{//user logged in
    include_once '../views/var.php';
    $conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
} 

$errors = array(); /* declare the array for later use */
        
        if(!isset($_POST['receiver_id']))
        {
            $errors[] = 'To field must not be empty.';
        }
    
        if(!isset($_POST['message_content']))
        {
            $errors[] = 'The message cannot be empty!';
        } if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }
        else
    {
        //the form has been posted without, so save it
        $receiver_id = $_POST['receiver_id'];
        $message_content = $_POST['message_content'];
        $sender_id=$_SESSION['id'] ;//the sender is the user logged in currently
        $date_time=(new \DateTime())->format('Y-m-d H:i:s');//current date and time

$valid_user_id =" SELECT id FROM `member` WHERE login_username=$receiver_id";
//getting the user is of the user name ( example user_name alex correspond to id 5)

$validation = $conn->query($valid_user_id );//user not in the db, query return empty set
if($validation)
        {//receiver exists in the db
$sql = "INSERT INTO mailbox( 
sender_id,
receiver_id,
date_time,
message_content)VALUES($sender_id,$receiver_id,'$date_time','$message_content')";
        $result = $conn->query($sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while sending the message. Please try again later.';
            echo '<a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
            
        }
        else
        {
            echo 'message successfully sent!  <a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
        }	

    }else{//reciver doesn't exist in the db.
                    echo '<b>You have supplied a none existing receiver id. Please try again.<b> <br>';
                    echo '<a href="/Condo-Association-Project/index.php">Go back to the forum overview</a>.';
    }
}}
?>
