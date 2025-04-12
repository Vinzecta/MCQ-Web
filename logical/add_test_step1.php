<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./database_connect.php";
require_once "./function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    $test_name = sanitize_input($_POST['test_name']);
    $test_category = sanitize_input($_POST['test_category']);
    $test_description = sanitize_input($_POST['test_description']);
    $test_time_limit = sanitize_input($_POST['test_time_limit']);
    if($test_name && $test_category && $test_time_limit && filter_var($test_time_limit, FILTER_VALIDATE_INT) !== false) {
        $_SESSION['test_name'] = $test_name;
        $_SESSION['test_category'] = $test_category;
        $_SESSION['test_description'] = $test_description;
        $_SESSION['test_time_limit'] = (int) $test_time_limit;
        $_SESSION['info'] = 'add_question';
    }  
    else {
        $_SESSION['error_message'] = 'Invalid input. Try again';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);