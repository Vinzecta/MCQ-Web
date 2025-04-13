<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/view_quiz_attempt.css">
    <title>Ligma - View Quiz</title>
</head>
<body>
    <form id="question-area" enctype="multipart/form-data" method="POST" action="../logical/add_q_process.php">
            <div class="questions correct"> <!-- Add class correct if the answer is correct -->
                <h1 class="number-question">Question 1</h1>
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1' disabled>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2' disabled>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3' disabled>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' checked value='4' disabled>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="questions incorrect"> <!-- Add class incorrect if the answer is incorrect -->
                <h1 class="number-question">Question 2</h1>
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1' disabled>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2' disabled>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3' disabled>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='4' disabled>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="questions incorrect">
                <h1 class="number-question">Question 3</h1>
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1' disabled>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2' disabled>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3' disabled>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='4' disabled>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>
    </form>

   <?php 
        include "./Components/footer.php"
   ?>
</body>
</html>