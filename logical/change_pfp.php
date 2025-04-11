<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./database_connect.php";
require_once "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pfp_image"]["name"])) {
    $pfp_image = $_FILES["pfp_image"]["name"];
    $ext = '';
    switch($_FILES["pfp_image"]["type"]) {
        case 'image/jpg': $ext = '.jpg'; break;
        case 'image/jpeg': $ext = '.jpg'; break;
        case 'image/png': $ext = '.png'; break;
        default:
            $_SESSION['error_message'] = 'Wrong file type, only .jpg and png are allowed. Try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if($_FILES["pfp_image"]["size"] > 2000000) {
        $_SESSION['error_message'] = 'File to large. Try again';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    $filename = 'User_' . $_SESSION['User_ID'] . 'PFP'. $ext;
    $cover_path = "../images/account/" . $filename;
    $_SESSION['PFP_URL'] = $cover_path;
    if (!move_uploaded_file($_FILES["pfp_image"]["tmp_name"], $cover_path)) {
        $_SESSION['error_message'] = 'Can not upload file, try again';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Update path in database
    $update_pfp_url_query = "UPDATE Users Set PFP_URL = ? WHERE User_ID = ?";
    $update_pfp_url_stmt = $connection->prepare($update_pfp_url_query);
    $update_pfp_url_stmt->bind_param("si", $cover_path, $_SESSION["User_ID"]);
    $update_pfp_url_stmt->execute();

    $_SESSION['success_message'] = 'Change profile picture successfully';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);