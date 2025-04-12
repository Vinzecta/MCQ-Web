<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/quiz_detail.css">
    <title>Ligma - Quiz Detail</title>
</head>
<body>
    <?php
        require_once "./Components/header.php";
    ?>

    <section id="quiz-description">
        <div id="quiz-image">
            <img src="../images/quiz_detail/math.jpg" alt="math">
        </div>

        <div id="about-quiz">
            <h1>Math</h1>
            <p class="description-hidden">fdvsnvsdvnsdvgn</p>
            <p class="show" id="show-more">Show more</p>
            <p class="show" id="show-less">Show less</p>
            <p>Author: abc</p>
            <p>Day created: 01/02/2025</p>
            <div id="attemp-display">
                <p>Your attempts: 10</p>
                <p>Total attempts: 100</p>
            </div>
        </div>
    </section>

    <?php
        require_once "./Components/footer.php";
    ?>

    <script src="../js/Page/quiz_detail.js"></script>
</body>
</html>