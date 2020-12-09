<?php
/**
 * Created by PhpStorm.
 * User: samuelg
 * Date: 12/8/2020
 * Time: 4:02 PM
 */
session_start();
include_once '../views/var.php';

$conn = mysqli_connect($servername,$username,$password,$dbname);

$commentor_id = $_POST['commentor_id'];
$comment_text = $_POST['comment'];
$post_id = $_POST['post_id'];
$date_time = $_POST['date_time'];


$sql = "INSERT INTO `comment` (date_time, commentor_id, text, post_id) VALUES ('{$date_time}', '{$commentor_id}', '{$comment_text}', '{$post_id}' )";
$result = $conn -> query($sql);
if ($result){
  echo "Successfully added comment. ";
} else {
  echo "Error adding the comment. ";
}

echo '<a href="/Condo-Association-Project/index.php">Go back to the main page</a>.';