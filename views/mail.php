<?php session_start() ?>
<div class="dashboard">
    <?php 
    
        if (isset($_SESSION["privilege"]) && $_SESSION['privilege'] === 'admin') {
            include '../components/dashboard/admin.php';
        }
        include '../controllers/getmails.php';
    ?>
</div>