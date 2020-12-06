<?php 
include_once '\Condo-Association-Project\var.php';
$conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 
$errors = array(); /* declare the array for later use */

if(!isset($_POST['uid']))
{
    $errors[] = 'user id field must not be empty.';
}elseif(isset($_POST['uid'])){
   $uid = $_POST['uid'];
   $exist_user ="SELECT * FROM member WHERE  login_username = '" . mysqli_real_escape_string($conn, $_POST['uid']) . "'";
   $existing_user = $conn->query($exist_user);



   if(mysqli_num_rows($existing_user)>0){
     $sql = "DELETE FROM member WHERE  login_username = '" . mysqli_real_escape_string($conn, $_POST['uid']) . "'";
     $result = $conn->query($sql);
     if(!$result)
     {
            //something went wrong, display the error
        echo 'Something went wrong while deleting the user. Please try again later.';
        echo '<a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
           
    }
    else
    {
        echo 'Successfully deleted!  <a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
    }
}
					else{// the user dosn't exist
                  echo "the user $uid doesn't exist! No action to be taken.";
                  echo '<a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
              }


          }else{
           echo 'illigal access';
           echo '<a href="/Condo-Association-Project/index.php">Go back to dashboard </a> ';
       }


       ?>