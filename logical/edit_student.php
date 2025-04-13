<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "./database_connect.php";
require_once "./function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    $update_student_query = 'UPDATE Student SET Student_status = ? WHERE User_ID = ?';
    $update_student_stmt = $connection->prepare($update_student_query);
    $updated_status = '';
    $user_id = 0;
    if(isset($_POST['active'])) {
        $updated_status = 'active';
        $user_id = (int) sanitize_input($_POST['active']);
    }
    else {
        $updated_status = 'banned';
        $user_id = sanitize_input($_POST['banned']);
    }
    $update_student_stmt->bind_param("si", $updated_status, $user_id);
    $update_student_stmt->execute();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);