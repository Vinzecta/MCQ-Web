<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/view_quiz.css">
    <title>Ligma - View Quiz</title>
</head>
<body>
    <?php 
    require_once "./Components/header.php";
    require_once "../logical/database_connect.php";
    require_once "../logical/function.php";
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
    if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
        header("Location: $base_url/pages/index.php?page=you_have_been_banned");
        exit;
    }
    $Test_ID = sanitize_input($_GET['quiz_id']);
    if (filter_var($Test_ID, FILTER_VALIDATE_INT) !== false && (int) $Test_ID > 0) {
        $Test_ID = (int) $Test_ID;
        
    }
    else {
        header("Location: $base_url/pages/index.php?page=landing_page");
        exit;
    }
    $test_name_query = "SELECT Test_name FROM Test where Test_ID = ?";
    $test_name_stmt = $connection->prepare($test_name_query);
    $test_name_stmt->bind_param('i',$Test_ID);
    $test_name_stmt->execute();
    $test_name_result = $test_name_stmt->get_result();
    $test_name = $test_name_result->fetch_assoc();
    $test_name = $test_name['Test_name'];

    $test_and_questions_query = "SELECT 
                                    t.Test_name,
                                    q.Question_ID,
                                    q.Question_name,
                                    q.Question_URL,
                                    c.Choice_Number,
                                    c.Content
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
    if ($tq_result->num_rows < 20) {
        header("Location: $base_url/pages/index.php?page=landing_page");
        exit;
    }
    function takeRandomFromSet(&$set) {
        if (empty($set)) {
            return null;
        }
        $randomIndex = array_rand($set);
        $value = $set[$randomIndex]; 
        unset($set[$randomIndex]);
        $set = array_values($set); 
        return $value;
    }
    echo '<h1 style="text-align: center;">' . $test_name . '</h1>';
    ?>
    <div id="question-area">
    <?php 
        $set = [];
        while($tq = $tq_result->fetch_assoc()) {
            $set[] = $tq['Content'];
            $tq = $tq_result->fetch_assoc();
            $set[] = $tq['Content'];
            $tq = $tq_result->fetch_assoc();
            $set[] = $tq['Content'];
            $tq = $tq_result->fetch_assoc();
            $set[] = $tq['Content'];
            echo '<div class="questions">';
                echo '<div class="image-upload">';
                    echo '<img class="question-image" src="' . $tq['Question_URL'] . '">';
                echo '</div>';
                echo '<p class="enter-question" name="question[' . $tq['Question_ID'] . ']">' . $tq['Question_name'] . '</p>';
                echo '<div class="question-choice">';
                        $randomString = takeRandomFromSet($set);
                        echo '<div class="answers">';
                            echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '" disabled>';
                            echo '<label>';
                                echo '<p>A.</p>';
                                echo '<p>' . $randomString . '</p>';
                            echo '</label>';
                        echo '</div>';
                        $randomString = takeRandomFromSet($set);
                        echo '<div class="answers">';
                            echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '" disabled>';
                            echo '<label>';
                                echo '<p>B.</p>';
                                echo '<p>' . $randomString . '</p>';
                            echo '</label>';
                        echo '</div>';
                        $randomString = takeRandomFromSet($set);
                        echo '<div class="answers">';
                            echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '" disabled>';
                            echo '<label>';
                                echo '<p>C.</p>';
                                echo '<p>' . $randomString . '</p>';
                            echo '</label>';
                        echo '</div>';
                        $randomString = takeRandomFromSet($set);
                        echo '<div class="answers">';
                            echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '" disabled>';
                            echo '<label>';
                                echo '<p>D.</p>';
                                echo '<p>' . $randomString . '</p>';
                            echo '</label>';
                        echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

   <?php 
        include "./Components/footer.php"
   ?>
</body>
</html>