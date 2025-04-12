<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./database_connect.php";
require_once "./function.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) { 
    // $test_name = sanitize_input($_POST['test_name']);
    // $test_category = sanitize_input($_POST['test_category']);
    // $test_description = sanitize_input($_POST['test_description']);
    // $test_time_limit = sanitize_input($_POST['test_time_limit']);
    // if($test_name && $test_category && $test_time_limit && filter_var($test_time_limit, FILTER_VALIDATE_INT) !== false) {
    //     $_SESSION['test_name'] = $test_name;
    //     $_SESSION['test_category'] = $test_category;
    //     $_SESSION['test_description'] = $test_description;
    //     $_SESSION['test_time_limit'] = (int) $test_time_limit;
    //     $_SESSION['info'] = 'add_question';
    // }  
    // else {
    //     $_SESSION['error_message'] = 'Invalid input. Try again';
    //     header('Location: ' . $_SERVER['HTTP_REFERER']);
    //     exit;
    // }
    $question_num = 0;
    foreach ($_POST as $key => $value) {
        // Check if the current POST key corresponds to a checkbox name
        if (strpos($key, 'Question_') === 0) {
            $question_num += 1;
        }
    }
    // check if questions number is less than 5
    if ($question_num < 5) {
        $_SESSION['error_message'] = 'Not enough question. Try again';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    // add test
        $test_name = $_SESSION['test_name'];
        $test_category = $_SESSION['test_category'];
        $test_description = $_SESSION['test_description'];
        $test_time_limit = $_SESSION['test_time_limit'];
        $Admin_ID = $_SESSION['Admin_ID'];
    $add_test_query = "INSERT INTO Test (Test_name, Time_allowed, Category, Admin_ID, descriptions) VALUES (?, ?, ? , ?, ?)";
    $add_test_stmt = $connection->prepare($add_test_query);
    $add_test_stmt->bind_param("sisis", $test_name, $test_time_limit, $test_category, $Admin_ID, $test_description);
    $add_test_stmt->execute();

    $test_id = $connection->insert_id;
    // add relationship between test and questions
    foreach ($_POST as $key => $value) {
        // Check if the current POST key corresponds to a checkbox name
        if (strpos($key, 'Question_') === 0) {
            $add_test_question_query = "INSERT INTO TestQuestions (Test_ID, Question_ID) VALUES (?, ?)";
            $add_test_question_stmt = $connection->prepare($add_test_question_query);
            $add_test_question_stmt->bind_param("ii", $test_id, $value);
            $add_test_question_stmt->execute();
        }
    }

    // change test state
    $_SESSION['info'] = 'basic';

    $_SESSION['success_message'] = 'Add test successfully';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);