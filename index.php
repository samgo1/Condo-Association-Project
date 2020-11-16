<?php 
    require_once('Routes.php');

    function __autoload($className){
        if (file_exists('./classes/'.$className.'.php')){
            require_once './classes/'.$className.'.php';
        }
        else if (file_exists('./controllers/'.$className.'.php')){
            require_once './controllers/'.$className.'.php';
        }
    }
?>