<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "./database_connect.php";
require_once "./function.php";
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = sanitize_input($_POST['Email']);
    $username = sanitize_input($_POST['Username']);
    $password = sanitize_input($_POST['Password']);
    $confirm_password = sanitize_input($_POST['Confirm_password']);
    
    if ($email && $username && $password && $confirm_password) { 
        $check_email_query = "SELECT Email FROM Users where Email = ?";
        $check_email_statement = $connection->prepare($check_email_query);
        $check_email_statement->bind_param("s", $email);
        $check_email_statement->execute();
        $result = $check_email_statement->get_result();

        if ($result->num_rows > 0) { 
            $_SESSION['error_message'] = "Email is already registered. Please use another email or sign in.";
            $connection->close();
            header("Location: $base_url/pages/index.php?page=sign_up");
        }
        else {
            $salt1 = "%$32*^";
            $salt2 = "fwfbgh#$()";
            $token = hash('ripemd128', "$salt1$password$salt2");
            add_student($connection, $email, $username, $token);
            $_SESSION['success_message'] = "Sign up successfully, redirect to sign in page..."
            $connection->close();
            header("Location: $base_url/pages/index.php?page=sign_in");
        }
    }
    else {
        $_SESSION['error_message'] = "Invalid input. Please fill out all fields correctly.";
        $connection->close();
        header("Location: $base_url/pages/index.php?page=sign_up");
    }
}