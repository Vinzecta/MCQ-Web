<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
if(isset($_SESSION["User_ID"])) {
    session_unset();
    session_destroy();
    header("Location: $base_url/pages/index.php?page=landing_page");
}