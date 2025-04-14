<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/take_test.css">
    <title>Ligma - Take Test</title>
</head>
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
    $test_and_questions_query = "SELECT 
                                    t.Time_allowed,
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

?>
<body>
    <form id="question-area" method="POST" action="../logical/take_test_proccess.php">
        <input type="hidden" name="Test_ID" value="<?php echo htmlspecialchars($Test_ID, ENT_QUOTES, 'UTF-8'); ?>">
            <?php 
            $set = [];
            $time_limit = 0;
            while($tq = $tq_result->fetch_assoc()) {
                $time_limit = $tq['Time_allowed'];
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
                                echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '">';
                                echo '<label>';
                                    echo '<p>A.</p>';
                                    echo '<p>' . $randomString . '</p>';
                                echo '</label>';
                            echo '</div>';

                            $randomString = takeRandomFromSet($set);
                            echo '<div class="answers">';
                                echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '">';
                                echo '<label>';
                                    echo '<p>B.</p>';
                                    echo '<p>' . $randomString . '</p>';
                                echo '</label>';
                            echo '</div>';

                            $randomString = takeRandomFromSet($set);
                            echo '<div class="answers">';
                                echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '">';
                                echo '<label>';
                                    echo '<p>C.</p>';
                                    echo '<p>' . $randomString . '</p>';
                                echo '</label>';
                            echo '</div>';

                            $randomString = takeRandomFromSet($set);
                            echo '<div class="answers">';
                                echo '<input type="radio" name="choose[' . $tq['Question_ID'] . ']" value="' . $randomString . '">';
                                echo '<label>';
                                    echo '<p>D.</p>';
                                    echo '<p>' . $randomString . '</p>';
                                echo '</label>';
                            echo '</div>';

                    echo '</div>';
                echo '</div>';
            }

            ?>
            <button type="submit">Submit</button>
    </form>

    <p id="countdown">00:<?php echo $time_limit;?>:00</p> <!-- Time value from database -->

    <script>
        function minutesToHHMMSS(totalSeconds) {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            const pad = (num) => String(num).padStart(2, '0');
            return `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
        }

        function startCountdown(startMinutes) {
            let totalSeconds = startMinutes * 60;

            // Check if we have a saved time in localStorage
            const saved_time = localStorage.getItem("remainingTime");
            if (saved_time) {
                totalSeconds = parseInt(saved_time, 10);
            }

            const countdownEl = document.getElementById("countdown");

            const interval = setInterval(() => {
                countdownEl.textContent = minutesToHHMMSS(totalSeconds);

                // Save the remaining time in localStorage
                localStorage.setItem("remainingTime", totalSeconds);

                // Change the background color to red if there are less than 60 seconds
                if (totalSeconds <= 60) {
                    countdownEl.style.backgroundColor = "#842029"; // Dark red
                }

                // Stop the countdown and clear the saved time once it reaches 00:00
                if (totalSeconds <= 0) {
                    clearInterval(interval);
                    countdownEl.textContent = "00:00:00"; //Leads to quiz-detail page
                    document.getElementById("question-area").submit();
                    localStorage.removeItem("remainingTime");
                }

                totalSeconds--;
            }, 1000);
        }

        // Start countdown from saved time or default to 2 minutes
        startCountdown(<?php echo $time_limit;?>);
    </script>


   <?php 
        include "./pages/Components/footer.php"
   ?>
</body>
</html>