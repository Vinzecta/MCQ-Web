<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once "./database_connect.php";
require_once "./function.php";
$Test_ID = 0;
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Test_ID'])) { 
    $Test_ID = $_POST['Test_ID'];
    $Student_ID = $_SESSION['Student_ID'];
    $test_attempt_insert = "INSERT INTO Test_Attempt (Test_ID, Student_ID) VALUES (?, ?)";
    $test_attempt_stmt = $connection->prepare($test_attempt_insert);
    $test_attempt_stmt->bind_param('ii', $Test_ID, $Student_ID);
    $test_attempt_stmt->execute();
    $test_attempt_id = $connection->insert_id; // test attempt
    $test_and_questions_query = "SELECT 
                                    t.Time_allowed,
                                    q.Question_ID,
                                    q.Question_name,
                                    q.Question_URL,
                                    c.Choice_Number,
                                    c.Content,
                                    c.Is_answer
                                FROM 
                                    Test t
                                JOIN 
                                    TestQuestions tq ON t.Test_ID = tq.Test_ID
                                JOIN 
                                    Question q ON tq.Question_ID = q.Question_ID
                                JOIN 
                                    Choice c ON q.Question_ID = c.Question_ID
                                WHERE 
                                    t.Test_ID = ?;";
    $tq_stmt = $connection->prepare($test_and_questions_query);
    $tq_stmt->bind_param('i',$Test_ID);
    $tq_stmt->execute();
    $tq_result = $tq_stmt->get_result();
    $score = 0;
    // traverse through each choices
    while($tq = $tq_result->fetch_assoc()) {
        $Question_ID = $tq['Question_ID'];
        $Question_name = $tq['Question_name'];
        $Is_answer = $tq['Is_answer'];
        $Content = $tq['Content'];
        $choice_number = $tq['Choice_Number'];
        if(!isset($_POST['choose'][$Question_ID])) {
            $check_attempt_query = "SELECT COUNT(*) AS attempt_count FROM Question_Attempt WHERE Attempt_ID = ? AND Question_ID = ?";
            $check_attempt_stmt = $connection->prepare($check_attempt_query);
            $check_attempt_stmt->bind_param('ii', $test_attempt_id, $Question_ID);
            $check_attempt_stmt->execute();
            $check_attempt_result = $check_attempt_stmt->get_result();
            $attempt_data = $check_attempt_result->fetch_assoc();

            if ($attempt_data['attempt_count'] == 0) {
                $Question_Attempt_add = "INSERT INTO Question_Attempt (Attempt_ID, Question_ID, Choice_Number, Is_correct) VALUES (?,?,?,?)";
                $Question_Attempt_stmt = $connection->prepare($Question_Attempt_add);
                $false = 0;
                $choice = 4;
                $Question_Attempt_stmt->bind_param('iiii', $test_attempt_id, $Question_ID, $choice, $false);
                $Question_Attempt_stmt->execute();
            }
        }
        else {
            if($Is_answer && $_POST['choose'][$Question_ID] == $Content) {
                $score+=1;
            }
            if($_POST['choose'][$Question_ID] == $Content) { // add to database question attempt
                $Question_Attempt_add = "INSERT INTO Question_Attempt (Attempt_ID, Question_ID, Choice_Number, Is_correct) VALUES (?,?,?,?)";
                $Question_Attempt_stmt = $connection->prepare($Question_Attempt_add);
                $Question_Attempt_stmt->bind_param('iiii', $test_attempt_id, $Question_ID, $choice_number, $Is_answer);
                $Question_Attempt_stmt->execute();
            }
        }
    }

    $update_test_attempt = "UPDATE Test_Attempt SET Score = ? WHERE Attempt_ID = ?";
    $update_test_attempt_stmt = $connection->prepare($update_test_attempt);
    $update_test_attempt_stmt->bind_param("ii", $score, $test_attempt_id);
    $update_test_attempt_stmt->execute();
}
header("Location: $base_url//pages/index.php?page=quiz_detail&quiz_id=$Test_ID");