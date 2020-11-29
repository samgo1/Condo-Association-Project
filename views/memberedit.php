<?php
include 'var.php';
//create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}
//get results from database
$UID = (int)$_GET['ID'];

$result = mysqli_query($connection,"SELECT * FROM member where id = '$UID'");


if(mysqli_num_rows($result)>=1){
    while($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $status = $row['status'];
        $civic_address = $row['civic_address'];
        $email= $row['email'];
        $privilege= $row['privilege'];
        $login_username= $row['login_username'];
        $login_password= $row['login_password'];


    }
    ?>
    <form action="memberupdate.php" method="post">
        Modifying ID:<?=$UID;?><br>
        <input type="hidden" name="ID" value="<?=$UID;?>">
        Name: <input type="text" name="ud_name" value="<?=$name?>"><br>
        Status: <input type="text" name="ud_status" value="<?=$status?>"><br>
        Civic address: <input type="text" name="ud_civic_address" value="<?=$civic_address?>"><br>
        Email: <input type="text" name="ud_email" value="<?=$email?>"><br>
        Privilege: <input type="text" name="ud_privilege" value="<?=$privilege?>"><br>
        Login_username: <input type="text" name="ud_login_username" value="<?=$login_username?>"><br>
        Login_username: <input type="text" name="ud_login_password" value="<?=$login_password?>"><br>
        <input type="Submit">
    </form>
    <?php
}else{
    echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
}



?>










































