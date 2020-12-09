<!DOCTYPE html>
<?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();?>
<html>
    <head>
        <title>Con System</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/materialize.css">
        <link rel="stylesheet" href="./css/materialize.min.css">
        <link rel="stylesheet" href="./css/views/dashboard.css">
        <link rel="stylesheet" href="./css/views/members.css">
        <link rel="stylesheet" href="./css/views/mail.css">
        <link rel="stylesheet" href="./css/views/groups.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://material.io/resources/icons/?icon=exit_to_app&style=baseline">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <?php if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    $user_signed_in = isset($_SESSION["signed_in"])? true : false;?>
     <body <?php if ($user_signed_in) echo "onload=\"show('dashboard')\""; ?>>
        <div class="gridcontainer">
            <div class="header">
                <img src="./assets/con logo.png" alt="">
            </div>
            <div class="menubar">
                <button onClick="show('dashboard')">Dashboard</button>
                <?php if ($user_signed_in) echo "<button onClick=\"show('mail')\">Mail</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('write_post')\">Write a post</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('groups')\">Groups</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('members')\">Members</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('condos')\">Condos</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('requests')\">Requests</button>" ?>
                <?php if ($user_signed_in) echo "<button onClick=\"show('logout')\">Logout <span class=\"material-icons\">exit_to_app</span></button>" ?>
            </div>
            <div class="profile"></div>
            <div class="mainview" id="mainView"></div>
        </div>
        <script src="index.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
    </body>
</html>