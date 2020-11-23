<?php


    $psw=$_POST['psw'];
    $uid=$_POST['uid'];
    if (isset($psw)&&!empty($psw)&&isset($uid)&&!empty($uid) )  {
		require_once 'dbh.inc.php';
		
		 $sql = "SELECT 
                        id,
                        name,
                        privilege,
                        login_username
                    FROM
                        member
                    WHERE
                        login_username = '" . mysql_real_escape_string($_POST['uid']) . "'
                    AND
                        login_password = '" . sha1($_POST['psw']) . "'";
                         
            $result = mysql_query($sql);
		 if(!$result)
            {
                //something went wrong, display the error
                echo 'Something went wrong while signing in. Please try again later.';
                
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysql_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                }
                else
                {
                    session_start();
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysql_fetch_assoc($result))
                    {
                 	    $_SESSION['name'] = $row['name'];
                        $_SESSION['user_name']  = $row['login_username'];
                        $_SESSION['privilege'] = $row['privilege'];
                    }
                     
                    echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="\Condo-Association-Project\views\dashboard.php">Proceed to the forum overview</a>.';
                }


	}

}else {
	echo  $_POST['psw'].$_POST['uid'];
echo 'SOmething went wrong!';
//header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
}
