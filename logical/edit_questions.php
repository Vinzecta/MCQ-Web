<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./database_connect.php";
require_once "./function.php";

function update_question($question_id, $question_name, $category) {
    $update_question_query = "UPDATE Question SET Question_name = ?, Category = ? WHERE Question_ID = ?";
    $update_question_stmt = $connection->prepare($update_question_query);
    $update_question_stmt->bind_param("ssi", $question_name, $category, $question_id);
    $update_question_stmt->execute();
}

function update_choice($question_id, $choice_number, $content, $is_answer) {
    $update_choice_query = "UPDATE Choice SET Content = ?, Is_answer = ? WHERE Question_ID = ? AND Choice_Number = ?";
    $update_choice_stmt = $connection->prepare($update_choice_query);
    $update_choice_stmt->bind_param("bsii", $content, $is_answer, $question_id, $choice_number);
    $update_choice_stmt->execute()
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    $question_id = sanitize_input($_POST['question_id']);
    $question_name = sanitize_input($_POST['question']);
    $category = sanitize_input($_POST['category']);
    
    // update questions
    update_questions($question_id, $question_name, $category);

    // Update choices fix this if have ui
    for ($i = 0; $i < 4; $i++) {
        //update_choice here
    }
    // update image if presents
    if (isset($_FILES["Question_image"]["name"])) {
        $ext = '';
        switch($_FILES["Question_image"]["type"]) {
            case 'image/jpg': $ext = '.jpg'; break;
            case 'image/jpeg': $ext = '.jpg'; break;
            case 'image/png': $ext = '.png'; break;
            case 'image/gif': $ext = '.gif'; break;
            default:
                $_SESSION['error_message'] = 'Wrong file type, only .jpg, .png and .gif are allowed. Try again';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        if($_FILES["Question_image"]["size"] > 200000) {
            $_SESSION['error_message'] = 'File to large. Try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $filename = 'Questions_' . $question_id . '_img'. $ext;
        $Question_URL = "../images/question/" . $filename;

        if (!move_uploaded_file($_FILES["Question_image"]["tmp_name"], $Question_URL)) {
            $_SESSION['error_message'] = 'Can not upload file, try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        // Update path in database
        $update_question_url_query = "UPDATE Question Set Question_URL = ? WHERE Question_ID = ?";
        $update_question_url_stmt = $connection->prepare($update_question_url_query);
        $update_question_url_stmt->bind_param("si", $Question_URL, $question_id);
        $update_question_url_stmt->execute();
    }
    $_SESSION['success_message'] = 'Update questions successfully';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);