<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Con System</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/materialize.css">
        <link rel="stylesheet" href="./css/materialize.min.css">
        <link rel="stylesheet" href="./css/components/post.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <body onload="show('dashboard')">
        <div class="gridcontainer">
            <div class="header">
                <img src="./assets/con logo.png" alt="">
            </div>
            <div class="menubar">
                <button class="btn-flat" onClick="show('dashboard')">Dashboard</button>
                <button class="btn-flat" onClick="show('mail')">Mail</button>
                <button class="btn-flat" onClick="show('groups')">Groups</button>
                <button class="btn-flat" onClick="show('condos')">Members</button>
                <button class="btn-flat" onClick="show('condos')">Condos</button>
                <button class="btn-flat" onClick="show('condos')">Requests</button>
                <button class="btn-flat" onClick="show('logout')">Logout</button>
            </div>
            <div class="mainview" id="mainView"></div>
        </div>
    </body>
    <script src="index.js"></script>
</html>