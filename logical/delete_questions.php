<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    $question_id = sanitize_input($_POST['Question_ID']);
    $retrieve_question_img_query = "SELECT Question_URL FROM Question WHERE Question_ID = ?";
    $retrieve_question_img_stmt = $connection->prepare($retrieve_question_img_query);
    $retrieve_question_img_stmt->bind_param("i", $question_id);
    $retrieve_question_img_stmt->execute();
    $result = $retrieve_question_img_stmt->get_result();

    if($result->num_rows > 0) {
        $question = $result->fetch_assoc();
        $question_path = "../images/question/" . $question["Question_URL"];

        $delete_query = "DELETE FROM Question WHERE Question_ID = ?";
        $delete_stmt = $connection->prepare($delete_query);
        $delete_stmt->bind_param("i", $question_id);

        if ($delete_stmt->execute()) { 
            // delete question img
            if (file_exists($question_path) && !is_dir($question_path)) {
                unlink($question_path); // Deletes the file
            }
            $_SESSION['success_message'] = 'Delete questions successfully';
        }
        else {
            $_SESSION['error_message'] = 'Can not delete questions, try again!';
        }

    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);