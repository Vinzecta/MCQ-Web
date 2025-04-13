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
        require_once "./Components/header.php";
    ?>

    <section id="quiz-section">
        <div id="quiz-information">
            <h1>Math</h1>
            <p>Author: <span>Lmao</span></p>
            <p>Time Limit: <span>15 minutes</span></p>
            <p>Total Users: <span>100</span></p>
        </div>

        <div id="quiz-button">
            <a>Start Quiz</a>
            <a>View Quiz</a> <!-- View quiz questions no answers -->
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