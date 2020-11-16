<!DOCTYPE html>
<html>
    <head>
        <title>Con System</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/materialize.css">
        <link rel="stylesheet" href="./css/materialize.min.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    </head>
    <body>
        <div class="gridcontainer">
            <div class="header">
                <img src="./assets/con logo.png" alt="">
            </div>
            <div class="menubar">
                <button class="btn-flat" onClick="show('dashboard')">Dashboard</button>
                <button class="btn-flat" onClick="show('forums')">Forums</button>
                <button class="btn-flat" onClick="show('financialStatus')">Financial Status</button>
            </div>
            <div class="mainview" id="mainView"></div>
        </div>
        <script src="index.js"></script>
    </body>
</html>