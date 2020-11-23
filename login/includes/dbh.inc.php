<?php

$server = 'localhost';
$username   = 'root';
$password   = 'Azerty';
$database   = 'CONP';
 
$link = mysqli_connect('{localhost}', '{root}', '{Azerty}', '{CONP}');
//if connection is not successful you will see text error
if (!$link) {
       die('Could not connect: ' . mysql_error());
}
//if connection is successfully you will see message below
echo 'Connected successfully';
 
//mysqli_close($link);
