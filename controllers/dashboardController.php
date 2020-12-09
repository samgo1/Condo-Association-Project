<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include_once 'var.php';
$conn = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{

  //header('Location: https://192.168.1.16/fp/login/includes/loginbtn.inc.php');
  include '../login/includes/loginbtn.inc.php';


}//connected
else {

    echo '<h2> Welcome, ' . $_SESSION['name'] . '</h2>';

    if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
        echo '<h> your have ' . $_SESSION['privilege'] . ' privilege </h3>';
    }

  $member_id = $_SESSION['id'];

  // get the groups
  $sql = "SELECT name FROM `group` WHERE id IN ( 
            SELECT group_id FROM `group_membership` WHERE member_id = \" {$member_id} \")";

  $result = $conn->query($sql);
  $groups = $result->fetch_all();
  $num_of_groups = sizeof($groups);
  // get post informations
  $sql = "SELECT post_id FROM `post_visibility` WHERE member_id = \"  {$member_id}  \" ";

  $result0 = $conn->query($sql);

  $rows = [];

  while ($row = $result0->fetch_assoc()){

    array_push($rows, $row);
    // get post
    $post_id = $row['post_id'];
    $sql = "SELECT date_time, permission, content_text, content_img, author_id FROM `post`
          WHERE id=\" {$post_id} \" ";

    $result2 = $conn->query($sql);
    $post = $result2->fetch_row();


    $date_time = $post[0];
    $permission = $post[1];
    $content_text = $post[2];
    $content_img = $post[3];
    $author_id = $post[4];
    $sql = "SELECT name FROM `member` WHERE id ='{$author_id}'";
    $author_name = $conn->query($sql)->fetch_row()[0];
    include "../components/dashboard/post.php";

  }

  echo json_encode($rows);
}
?>