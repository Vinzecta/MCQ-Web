<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/take_test.css">
    <title>Ligma - Take Test</title>
</head>
<body>
    <form id="question-area" enctype="multipart/form-data" method="POST" action="../logical/add_q_process.php">
            <div class="questions">
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1'>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2'>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3'>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='4'>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="questions">
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1'>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2'>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3'>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='4'>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>

            <div class="questions">
                <div class="image-upload">
                    <img class="question-image" src="../images/question/default_question.png"> <!--Check the db if there is an image then display else no -->
                </div>

                <p class="enter-question" name="question[]">What is 1 + 1?</p>
                <div class="question-choice">
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='1'>
                        <label>
                            <p>A.</p>
                            <p name="question[]">1</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='2'>
                        <label>
                            <p>B.</p>
                            <p name="question[]">2</p>
                        </label>
                    </div>

                    <div class="answers">
                        <input type="radio" name='Is_answer' value='3'>
                        <label>
                            <p>C.</p>
                            <p name="question[]">3</p>
                        </label>
                    </div>
                
                    <div class="answers">
                        <input type="radio" name='Is_answer' value='4'>
                        <label>
                            <p>D.</p>
                            <p name="question[]">4</p>
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit">Submit</button>
    </form>

    <p id="countdown">00:00:00</p> <!-- Time value from database -->

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
                    localStorage.removeItem("remainingTime");
                }

                totalSeconds--;
            }, 1000);
        }

        // Start countdown from saved time or default to 2 minutes
        startCountdown(2);
    </script>


   <?php 
        include "./Components/footer.php"
   ?>
</body>
</html>