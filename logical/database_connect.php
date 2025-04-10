<?php 
    $db_server = '127.0.0.1';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'mcq';

$connection = new mysqli($db_server, $db_user, $db_pass, $db_name);

if($connection->connect_error) {
    echo "Failed to connect to the database :(";
    die($mysqli->connect_error);
}