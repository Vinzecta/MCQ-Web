<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/quiz_detail.css">
    <title>Ligma - Quiz Detail</title>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        require_once "./pages/Components/header.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
            header("Location: $base_url/pages/index.php?page=you_have_been_banned");
            exit;
        }

        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";

        $Test_ID = sanitize_input($_GET['quiz_id']);
        if (filter_var($Test_ID, FILTER_VALIDATE_INT) !== false && (int) $Test_ID > 0) {
            $Test_ID = (int) $Test_ID;
            $test_query = "SELECT 
                                        Users.User_name,
                                        Test.Test_ID,
                                        Test.Test_name,
                                        Test.Time_allowed,
                                        Test.Category
                                    FROM 
                                        Test
                                    JOIN 
                                        Admins ON Test.Admin_ID = Admins.Admin_ID
                                    JOIN 
                                        Users ON Admins.User_ID = Users.User_ID
                                    WHERE Test_ID = ?";
            $test_stmt = $connection->prepare($test_query);
            $test_stmt->bind_param('i', $Test_ID);
            $test_stmt->execute();
            $test_result = $test_stmt->get_result();
            if ($test_result->num_rows != 1) {
                header("Location: $base_url/pages/index.php?page=landing_page");
                exit;
            }
            $test = $test_result->fetch_assoc();
        }
        else {
            header("Location: $base_url/pages/index.php?page=landing_page");
            exit;
        }

    ?>

    <section id="quiz-section">
        <div id="quiz-information">
            <h1><?php echo $test['Test_name']; ?></h1>
            <p>Author: <span><?php echo $test['User_name']; ?></span></p>
            <p>Time Limit: <span><?php echo $test['Time_allowed']; ?> minutes</span></p>
            <p>Category: <span><?php echo $test['Category']; ?></span></p>
        </div>

        <div id="quiz-button">
            <?php 
                if(isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == FALSE) {
                    echo '<a href="index.php?page=take_test&quiz_id=' . $test['Test_ID'] . '">Start Quiz</a>';
                }
                echo '<a href="index.php?page=view_quiz&quiz_id=' . $test['Test_ID'] . '">View Quiz</a>';
            ?>
        </div>
    </section>
    <?php 
        if(isset($_SESSION['Student_ID'])) {
            $count_question_query = "SELECT COUNT(*) AS Question_Count FROM TestQuestions WHERE Test_ID = ?;";
            $count_question_stmt = $connection->prepare($count_question_query);
            $count_question_stmt->bind_param('i', $Test_ID);
            $count_question_stmt->execute();
            $count_question_result = $count_question_stmt->get_result();
            $count_question = $count_question_result->fetch_assoc();


            $Student_ID = $_SESSION['Student_ID'];
            $attempt_query = "SELECT * FROM Test_Attempt WHERE Test_ID = ? AND Student_ID = ?;";
            $attempt_stmt = $connection->prepare($attempt_query);
            $attempt_stmt->bind_param('ii', $Test_ID, $Student_ID); // Bind parameters (both are integers)
            $attempt_stmt->execute();
            $attempt_result = $attempt_stmt->get_result();
            if ($attempt_result->num_rows > 0) { 
                echo '<h1 id="your-attempt">Your Attempts: ' . $attempt_result->num_rows . '</h1>';
                echo '<section id="attempts-information">';
                    $attempt_num = 1;
                    while($attempt = $attempt_result->fetch_assoc()) {
                        echo '<div class="attempt">';
                            echo '<h2>Attempt ' . $attempt_num . '</h2>';
                            echo '<table>';
                                echo '<tr>';
                                    echo '<td class="label">Date:</td>';
                                    echo '<td>' . $attempt['Attempt_Date'] . '</td>';
                                echo '</tr>';

                                echo '<tr>';
                                    echo '<td class="label">Score:</td>';
                                    echo '<td>' . $attempt['Score'] . ' / ' . $count_question['Question_Count'] . ' </td>';
                                echo '</tr>';
                                
                            echo '</table>';
                            echo '<a href="index.php?page=view_quiz_attempt&quiz_id=' . $attempt['Test_ID'] . '&attempt_id=' . $attempt['Attempt_ID'] . '">View</a>';
                        echo '</div>';
                        $attempt_num+=1;
                    }
                
                echo '</section>';
            }
        }        
        
    ?>

    <?php
        require_once "./pages/Components/footer.php";
    ?>

    <script src="../js/Page/quiz_detail.js"></script>
</body>
</html>