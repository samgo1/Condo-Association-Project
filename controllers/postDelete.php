<?php
/**
 * Created by PhpStorm.
 * User: samuelg
 * Date: 12/8/2020
 * Time: 5:02 PM
 */


include_once '../views/var.php';

$conn = mysqli_connect($servername,$username,$password,$dbname);

$post_id = $_POST['post_id'];

$sql = "DELETE FROM `post` WHERE id='{$post_id}'";
$result = $conn -> query($sql);
if ($result){
  echo "Successfully deleted post. ";
} else {
  echo "An error occurred when deleting the post. ";
}

echo '<a href="/Condo-Association-Project/index.php">Go back to the main page</a>.';