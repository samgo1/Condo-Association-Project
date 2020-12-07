<?php

$author_id = $_POST['author_id'];
$visibility_list = isset($_POST['visibility']) ? $_POST['visibility'] : null;
$post_permission = $_POST['permission'];
$content_text = $_POST['content_text'];
$date_time = $_POST['date_time'];
$has_file = $_FILES['file_to_upload']['name'] !== "";
$target_dir = null;
$target_file = null;

if ($has_file){

  $target_dir = __DIR__ . "/../posts_pictures/";
  if (!file_exists($target_dir)){
    $result = mkdir($target_dir);
    if (result == false){
      echo "didn't work making the directory " . $target_dir;
      exit;
    }
  }

  $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $uploadOk = 1;

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.\n";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["file_to_upload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

include_once "../var.php";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "";
if ($target_file === null) {
  $sql = "INSERT INTO `post` (date_time, permission, author_id, content_text, content_img) VALUES (
  '{$date_time}', '{$post_permission}', '{$author_id}', '{$content_text}', NULL
)";
} else {
  $sql = "INSERT INTO `post` (date_time, permission, author_id, content_text, content_img) VALUES (
  '{$date_time}', '{$post_permission}', '{$author_id}', '{$content_text}', '{$target_file}' 
)";
}

$result = $conn->query($sql);

if ($result){
  echo "Successfully entered post.";
  // now retrieving that post's id
  $sql = "SELECT id FROM `post`
          WHERE date_time = '{$date_time}'
          AND author_id = '{$author_id}'";
  $result = $conn->query($sql);
  $post_id = $result->fetch_row()[0];

  // visibile to self
  $sql = "INSERT INTO `post_visibility` VALUES(
          '{$post_id}', '{$author_id}')";
  $result = $conn->query($sql);

  // post visibility queries
  if ($visibility_list !== null){
    foreach ($visibility_list as $value) {
      $sql = "INSERT INTO `post_visibility` VALUES(
          '{$post_id}', '{$value}')";
      $result = $conn->query($sql);
    }
  }

} else {
  echo "Error entering post.";
}

//$filename = basename($_FILES["file_to_upload"]["name"]);
//echo "<img src=\"/Condo-Association-Project/posts_pictures/" . $filename . "\" />";
echo "    <a href=\"/Condo-Association-Project/index.php\">go to main page</a>";



