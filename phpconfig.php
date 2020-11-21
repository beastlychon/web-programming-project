<?php
$db_username = 'root';
$db_password = '';
$db_name = 'attendance';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);


// Check connection
if ($mysqli->connect_error) {
    
    echo 'Failed';
} 
?>