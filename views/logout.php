<h1>LOGOUT</h1>
<?php
//session_start();
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
unset($_SESSION['signed_in']);
unset($_SESSION['name']);
unset($_SESSION['user_name']);
unset($_SESSION['privilege']);
session_destroy();
//header("Location: /Condo-Association-Project/index.php");
//exit();
?>
<script> location.reload(); </script>
