<!DOCTYPE html>
<html>
    <head>
        <title>Con System</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/materialize.css">
        <link rel="stylesheet" href="./css/materialize.min.css">
        <link rel="stylesheet" href="./css/views/dashboard.css">
        <link rel="stylesheet" href="./css/views/mail.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <body onload="show('mail')">
        <div class="gridcontainer">
            <div class="header">
                <img src="./assets/con logo.png" alt="">
            </div>
            <div class="menubar">
                <button onClick="show('dashboard')">Dashboard</button>
                <button onClick="show('mail')">Mail</button>
                <button onClick="show('groups')">Groups</button>
                <button onClick="show('members')">Members</button>
                <button onClick="show('condos')">Condos</button>
                <button onClick="show('requests')">Requests</button>
                <button onClick="show('logout')">Logout</button>
            </div>
            <div class="mainview" id="mainView"></div>
        </div>
    </body>
    <script src="index.js"></script>
</html>