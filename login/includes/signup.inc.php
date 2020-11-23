<?php  
require_once 'dbh.inc.php';

 $errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['name']))
        {
            $errors[] = 'name field must not be empty.';
        }
         
        if(!isset($_POST['psw']))
        {
            $errors[] = 'The password field must not be empty.';
        }
          if(!isset($_POST['uid']))
        {
            $errors[] = 'The userid field must not be empty.';
        }
          if(!isset($_POST['status']))
        {
            $errors[] = 'The status field must not be empty.';
        }
          if(!isset($_POST['privilege']))
        {
            $errors[] = 'The privilege field must not be empty.';
        }
             if(!isset($_POST['address']))
        {
            $errors[] = 'The address field must not be empty.';
        }
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }
        else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                   member(login_username,name,status,civic_address,email,privilege,login_password)
                VALUES($_POST['uid']) ,
              		   $_POST['name'],
                    $_POST['status']) ,
                     $_POST['address']),
                     $_POST['user_email']),
                     $_POST['privilege'],
                       sha1($_POST['psw']))";
                         


        $result = mysql_query($sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered.  <a href="\Condo-Association-Project\views\dashboard.php">Go back to dashboard </a> ';
        }
    }