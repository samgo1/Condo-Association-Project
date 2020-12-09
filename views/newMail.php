<?php 
session_start(); 

if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
    include '../components/dashboard/admin.php';
}
?>
<div class="dashboardNoScroll">
<div class="membersContainer">
    <form id="write_post_form" action="\Condo-Association-Project\controllers\mailer.php" method="post" enctype="multipart/form-data" >
        <label>To</label>
        <textarea name="receiver_id" class="materialize-textarea"></textarea>
        <label>Message</label>
        <textarea name="message_content" class="myTextarea"></textarea>
        <div>
            <br>
            <button class="btn" type="submit">Send</button>
        </div>
    </form>
</div>
</div>