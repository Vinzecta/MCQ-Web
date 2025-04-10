<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
require_once "./database_connect.php";
require_once "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_password = sanitize_input($_POST["password"]);
    $Confirm_password = sanitize_input($_POST["Re-type-password"]);

    if($update_password && $Confirm_password && $Confirm_password == $update_password) {
        $salt1 = "%$32*^";
        $salt2 = "fwfbgh#$()";
        $token = hash('ripemd128', "$salt1$update_password$salt2");
        $password_update_query = "UPDATE Users SET Password_hash = ? WHERE User_ID = ?";
        $password_update_stmt = $connection->prepare($password_update_query);
        $password_update_stmt->bind_param("si", $token, $_SESSION["User_ID"]);
        $password_update_stmt->execute();
        $_SESSION['success_message'] = "Update password successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $connection->close();
    }
    else {
        $_SESSION['error_message'] = "Invalid input, try again";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $connection->close();
    }
}