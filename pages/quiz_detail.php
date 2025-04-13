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
        require_once "./Components/header.php";
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
            <p>Time Limit: <span><?php echo $test['Time_allowed']; ?></span></p>
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
    
    <h1 id="your-attempt">Your Attempts: 10</h1>
    <section id="attempts-information">
        <div class="attempt">
            <h2>Attempt 1</h2>
            <table>
                <tr>
                    <td class="label">Date:</td>
                    <td>Thursday, 9 January, 2025</td>
                </tr>

                <tr>
                    <td class="label">Duration:</td>
                    <td>6 minutes 00 secs</td>
                </tr>

                <tr>
                    <td class="label">Score:</td>
                    <td>10.0/10.0</td>
                </tr>
            </table>
            <a>View</a> <!-- View attempted quiz -->
        </div>

        <div class="attempt">
            <h2>Attempt 2</h2>
            <table>
                <tr>
                    <td class="label">Date:</td>
                    <td>Thursday, 9 January, 2025</td>
                </tr>

                <tr>
                    <td class="label">Duration:</td>
                    <td>6 minutes 00 secs</td>
                </tr>

                <tr>
                    <td class="label">Score:</td>
                    <td>10.0/10.0</td>
                </tr>
            </table>
            <a>View</a> <!-- View attempted quiz -->
        </div>

        <div class="attempt">
            <h2>Attempt 3</h2>
            <table>
                <tr>
                    <td class="label">Date:</td>
                    <td>Thursday, 9 January, 2025</td>
                </tr>

                <tr>
                    <td class="label">Duration:</td>
                    <td>6 minutes 00 secs</td>
                </tr>

                <tr>
                    <td class="label">Score:</td>
                    <td>10.0/10.0</td>
                </tr>
            </table>
            <a>View</a> <!-- View attempted quiz -->
        </div>

        <div class="attempt">
            <h2>Attempt 4</h2>
            <table>
                <tr>
                    <td class="label">Date:</td>
                    <td>Thursday, 9 January, 2025</td>
                </tr>

                <tr>
                    <td class="label">Duration:</td>
                    <td>6 minutes 00 secs</td>
                </tr>

                <tr>
                    <td class="label">Score:</td>
                    <td>10.0/10.0</td>
                </tr>
            </table>
            <a>View</a> <!-- View attempted quiz -->
        </div>

        <div class="attempt">
            <h2>Attempt 5</h2>
            <table>
                <tr>
                    <td class="label">Date:</td>
                    <td>Thursday, 9 January, 2025</td>
                </tr>

                <tr>
                    <td class="label">Duration:</td>
                    <td>6 minutes 00 secs</td>
                </tr>

                <tr>
                    <td class="label">Score:</td>
                    <td>10.0/10.0</td>
                </tr>
            </table>
            <a>View</a> <!-- View attempted quiz -->
        </div>
    </section>

    <?php
        require_once "./Components/footer.php";
    ?>

    <script src="../js/Page/quiz_detail.js"></script>
</body>
</html>