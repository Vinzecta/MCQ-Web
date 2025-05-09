<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./database_connect.php";
require_once "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    for($i = 0; $i < 5; $i++) {
        if(!isset($_POST['question'][$i]) || empty(trim($_POST['question'][$i]))) {
            $_SESSION['error_message'] = 'Invalid input, try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    $question_name = sanitize_input($_POST['question'][0]);
    $category = sanitize_input($_POST['old_category']);
    if(isset($_POST['new_category']) && !empty(trim($_POST['new_category']))) {
        $category = sanitize_input($_POST['new_category']);
    }
    $admin_id = $_SESSION['Admin_ID'];

    // add questions
    $add_question_query = "INSERT INTO Question (Question_name, Category, Admin_ID) VALUES (?, ?, ?)";
    $add_question_stmt = $connection->prepare($add_question_query);
    $add_question_stmt->bind_param("ssi", $question_name, $category, $admin_id);
    $add_question_stmt->execute();

    $question_id = $connection->insert_id;
    $answer_number = (int) $_POST['Is_answer']; // RETURN answer number
    // add choices
    for ($i = 0; $i < 4; $i++) {
        $choice_number = $i+1;
        $content = $_POST['question'][$i+1];

        $is_answer = FALSE;
        if ($answer_number == $choice_number) { // if equal to answer number, is answer is true
            $is_answer = TRUE;
        }

        $add_choice_query = "INSERT INTO Choice (Question_ID, Choice_Number, Content, Is_answer) VALUES (?, ?, ?, ?)";
        $add_choice_stmt = $connection->prepare($add_choice_query);
        $add_choice_stmt->bind_param("iisi", $question_id, $choice_number, $content, $is_answer);
        $add_choice_stmt->execute();
    }


    // add image if presents
    $Question_URL = '../images/question/default_question.png';
    if (isset($_FILES['Question_image']) && $_FILES['Question_image']['error'] === UPLOAD_ERR_OK) {
        $ext = '';
        switch($_FILES["Question_image"]["type"]) {
            case 'image/jpg': $ext = '.jpg'; break;
            case 'image/jpeg': $ext = '.jpg'; break;
            case 'image/png': $ext = '.png'; break;
            case 'image/gif': $ext = '.gif'; break;
            default:
                $_SESSION['error_message'] = 'Add question successfully but wrong file type, only .jpg, .png and .gif are allowed. Try again';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
        }

        if($_FILES["Question_image"]["size"] > 2000000) {
            $_SESSION['error_message'] = 'File to large. Try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        $filename = 'Questions_' . $question_id . '_img'. $ext;
        $Question_URL = "../images/question/" . $filename;

        if (!move_uploaded_file($_FILES["Question_image"]["tmp_name"], $Question_URL)) {
            $_SESSION['error_message'] = 'Add question successfully but can not upload file, try again';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
            
    }

    // Update path in database
    $update_question_url_query = "UPDATE Question Set Question_URL = ? WHERE Question_ID = ?";
    $update_question_url_stmt = $connection->prepare($update_question_url_query);
    $update_question_url_stmt->bind_param("si", $Question_URL, $question_id);
    $update_question_url_stmt->execute();
    $_SESSION['success_message'] = 'Add questions successfully';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);