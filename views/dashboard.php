<?php
session_start();

if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] == false)
{
include_once '..\login\includes\loginbtn.inc.php';


}//connected
else{

	echo '<h2> Welcome, '.$_SESSION['priviles'] .' '. $_SESSION['name'].'</h2>' ;
	
	if($_SESSION['priviles']='admin'){
include_once '..\login\includes\signupbtn.inc.html';}

}





  ?>
<div class="dashboard">
    <?php 
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        include '../components/dashboard/post.php';
        
    ?>
</div>