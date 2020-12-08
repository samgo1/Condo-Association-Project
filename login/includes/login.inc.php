<?php
   
    if (isset($_POST['psw'])&&!empty($_POST['psw'])&&isset($_POST['uid'])&&!empty($_POST['uid']) )  {
		include_once '../../views/var.php';

		$conn = mysqli_connect($servername,$username,$password,$dbname);

 $psw=$_POST['psw'];
    $uid=$_POST['uid'];
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
		
		 $sql = "SELECT 
                        id,
                        name,
                        privilege,
                        login_username
                    FROM
                        member
                    WHERE
                        login_username = '" . mysqli_real_escape_string($conn, $_POST['uid']) . "'
                    AND
                        login_password = '" . mysqli_real_escape_string($conn, $_POST['psw']) . "'";
                       
                         
             $result = $conn->query($sql);
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
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'You have supplied a wrong user/password combination. Please try again.';
                    echo '<a href="../../index.php">Proceed to the forum overview</a>.';
              
                }
                else
                {
                  // should be the only place where we start a session
                  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysqli_fetch_assoc($result))
                    {
                 	    $_SESSION['name'] = $row['name'];
                        $_SESSION['user_name']  = $row['login_username'];
                        $_SESSION['privilege'] = $row['privilege'];
                        $_SESSION['id'] = $row['id'];
                    }
                     
                    echo 'Welcome, ' . $_SESSION['name'] . '. <a href="../../index.php">Proceed to the forum overview</a>.';
                }


	          }

    }else {
	      
        echo '<b> illegal access! Please access to the login properly!!<b>';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
		    exit();
    }
