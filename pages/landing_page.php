<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/landing_page.css">
    <title>Ligma - Home</title>
</head>
<body>
    <?php
        require_once "./Components/header.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
            header("Location: $base_url/pages/index.php?page=you_have_been_banned");
            exit;
        }
    ?>
    
    <section id="banner">
        <div id="left-banner">
            <h1>Take Online Exam</h1>
            <p>Anytime, Anywhere, Hassle-Free!</p>
        </div>
        <div id="right-banner">
            <img src="../images/landing_page/online_exam.jpg" alt="Online exam">
        </div>
    </section>

    <section id="content">
        <div class="inside">
            <div class="left-content">
                <h1>Every class, every test—your ultimate study companion.</h1>
                <p>Create your own quiz or explore sets crafted by teachers, students, and experts. Study anytime, anywhere with our free platform.</p>
            </div>

            <div class="right-content">
                <img src="../images/landing_page/online_exam 2.jpg" alt="Online exam 2">
            </div>
        </div>

        <div class="inside">
            <div class="left-content">
                <img src="../images/landing_page/online quiz.jpg" alt="Online exam 3">
            </div>

            <div class="right-content">
                <h1>Learn Beyond the Grade: Transform Studying into True Understanding</h1>
                <p>Empower students to do more than just memorize facts for a grade. Convert class materials—slides, videos, and notes—into interactive quizzes, flashcards, and study guides that promote deeper learning, critical thinking, and long-term knowledge retention. Because education isn’t just about passing tests—it’s about truly understanding and applying what you learn.</p>
                <a class="sign-up-button" href="index.php?page=sign_up">Try it out!</a>
            </div>
        </div>

        <div class="inside" id="admin-content">
            <div class="left-content">
                <h1>Empower Education: Create Quizzes That Inspire Learning</h1>
                <p>As an admin, you have the power to shape the learning experience. Easily create and manage quizzes that not only assess students but also help them gain valuable knowledge. Transform ordinary assessments into engaging learning tools that promote understanding, critical thinking, and academic success.</p>
            </div>

            <div class="right-content">
                <img src="../images/landing_page/teaching.jpg" alt="Teaching">
            </div>
        </div>
    </section>

    <!-- <section id="popular-quiz">
        <h2>Popular quiz</h2>
        <div id="quizzes">
            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>

            <div class="quiz">
                <h3>Quiz 1</h3>
                <p class="attempts">100 attempts</p>
                <div class="author">
                    <img src="../images/header/user.png" alt="user">
                    <p>Johnson</p>
                </div>
                <div class="view-button">
                    <a href="index.php?page=quiz">View</a>
                </div>
            </div>
        </div>   -->

        <?php
        require_once "./Components/footer.php";
        ?>
    </section>
</body>
</html>
