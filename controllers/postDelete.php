<?php

session_start();
include_once '../views/var.php';

$conn = mysqli_connect($servername,$username,$password,$dbname);

$post_id = $_POST['post_id'];

$sql = "DELETE FROM `commment` WHERE post_id='{$post_id}'";
$result = $conn -> query($sql);

$sql = "DELETE FROM `post_visibility` WHERE post_id='{$post_id}'";
$result = $conn -> query($sql);

$sql = "DELETE FROM `post` WHERE id='{$post_id}'";
$result = $conn -> query($sql);
if ($result){
  echo "Successfully deleted post. ";
} else {
  echo "An error occurred when deleting the post. ";
}

echo '<a href="/Condo-Association-Project/index.php">Go back to the main page</a>.';