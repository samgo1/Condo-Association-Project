<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
    echo "Illegal access";
    echo '<a href="/fp/index.php">Proceed to the forum CON general page</a>.';
}



//connected
else {

    echo '<h6> Welcome, ' . $_SESSION['name'] . '</h6><br>';

//echo $_SESSION['id'];


    echo '<form action="memberinsert.php" method="post">
        Create new user
        Name: <input type="text" name="ud_name" value="Insert name"><br>
        Civic address: <input type="text" name="ud_civic_address" value="insert the address"><br>
        Email: <input type="text" name="ud_email" value="Insert your email"><br>
        Login_username: <input type="text" name="ud_login_username" value="insert the username"><br>
        Login_username: <input type="text" name="ud_login_password" value="insert the password"><br>
        <input type="Submit">
    </form>';

}
?>











































