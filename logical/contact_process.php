<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "./database_connect.php";
require_once "./function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST["email"]);
    $title = sanitize_input($_POST["title"]);
    $message = sanitize_input($_POST["message"]);
    if ($email && $title && $message) { 
        $add_contact_query = 'INSERT INTO Contact (Email, Title, Messages) VALUES (?, ?, ?)';
        $add_contact_statement = $connection->prepare($add_contact_query);
        $add_contact_statement->bind_param("sss", $email, $title, $message);
        $add_contact_statement->execute();
        $_SESSION['success_message'] = 'Thanking for reaching out :>';
        $connection->close();
    }
    else {
        $_SESSION['error_message'] = 'Invalid input :<';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        $connection->close();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);