<?php 
require_once "./database_connect.php";
require_once "./function.php";
if(isset($_GET["question_search"])) {
    $question_search = sanitize_input($_GET["question_search"]);
    if(!isset($_SESSION["sort_order"])) {
        $_SESSION["sort_order"] = '_';
    }
    if(!isset($_SESSION["sort_by"])) {
        $_SESSION["sort_by"] = '_';
    }
    $questions_stmt = "";
    $question_query = "";
    $questions_search_param = '%' . $question_search . '%';
    if($_SESSION["sort_by"] != "_" && $_SESSION["sort_order"] != "_") { // Enough sort categories selected
        $question_query = "SELECT 
                    Question.Question_ID, 
                    Question.Question_name, 
                    Question.Category, 
                    Question.Question_URL, 
                    Choice.Choice_Number, 
                    Choice.Content
                FROM 
                    Question
                JOIN 
                    Choice 
                ON 
                    Question.Question_ID = Choice.Question_ID
                WHERE Question_name LIKE ? OR Category LIKE ?
                ORDER BY ? ?";
        $questions_stmt = $connection->prepare($question_query);
        $questions_stmt->bind_param("ssss", $questions_search_param, $questions_search_param, $_SESSION["sort_by"], $_SESSION["sort_order"]);
    }
    else {
        $question_query = "SELECT 
                    Question.Question_ID, 
                    Question.Question_name, 
                    Question.Category, 
                    Question.Question_URL, 
                    Choice.Choice_Number, 
                    Choice.Content
                FROM 
                    Question
                JOIN 
                    Choice 
                ON 
                    Question.Question_ID = Choice.Question_ID
                WHERE Question_name LIKE ? OR Category LIKE ?";
        $questions_stmt = $connection->prepare($question_query);
        $questions_stmt->bind_param("ss", $questions_search_param, $questions_search_param);
    }
    $questions_stmt->execute();
    $questions_result = $questions_stmt->get_result();
    if ($questions_result->num_rows > 0) {  
        while($question = $questions_result->fetch_assoc()) { 
            echo '<div class="questions">';
                echo '<p class="question-section">"' . $question['Question_name'] .'"</p>';
                echo '<div class="question-information">';
                    echo '<div class="answers">';
                        echo '<p>A.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions_result->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>B.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions_result->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>C.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions_result->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>D.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="modify-section">';
                        echo '<a href="index.php?page=question_edit&question_id=' . $question['Question_ID'] . '">Edit</a>';
                        echo '<form method="POST" action="../logical/delete_questions.php" enctype="multipart/form-data">';
                            echo '<button class="delete-question" type="submit" value="' . $question['Question_ID'] . '" name="DELETE_ID">Delete</button>';
                        echo '</form>';
                    echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No results found';
    }

}
else {
    echo 'No results found';
}