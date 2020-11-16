<?php 

    include './views/index.php'; 
    require_once('Routes.php');

    function __autoload($className){
        require_once './classes/'.$className.'.php';
    }
    echo $_GET['url'];
?>