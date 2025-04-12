<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/question_edit.css">
    <title>Ligma - Edit Question</title>
</head>
<body>
    <?php 
        include "./Components/header.php";
    ?>

    <h1 id="question-edit">Question Information</h1>

    <form id="question-area" enctype="multipart/form-data" method="POST" action="../logical/add_q_process.php">
        <!-- Category selection -->
        <div class="choose-category">
            <label>Category</label>
            <select name='old_category'>
                <!-- Do later, echo unique  -->
                <option value='Math'>Math</option>
                <option value='Physics'>Physics</option>
                <option value='Chemistry' selected>Chemistry</option>
                <option value='History'>History</option>
            </select>
            <p id="a-new-category">Have a new category? <span id="add-category">Click here!</span></p>
            <input id="new-category" placeholder="Enter new category" style="display: none" name="new_category">
        </div>

        <!-- Question selection -->
        <div class="questions">
            <!-- Image upload -->
            <div class="image-upload">
                <label class="image-label">
                    <img id="question-image" src="../images/question/default_question.png">
                    <p>Supported formats: JPEG, PNG, GIF (Max size: 2MB).</p>
                </label>
                <input id="file-upload" type="file" accept=".jpeg, .png, .gif, .jpg" name="Question_image">
            </div>

            <textarea class="enter-question" name="question[]">What is 1 + 1?</textarea>
            <div class="question-choice">
                <div class="answers">
                    <input type="radio" name='Is_answer' value='1' checked>
                    <label>
                        <p>A.</p>
                        <textarea placeholder="Enter choice" name="question[]">2</textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio" name='Is_answer' value='2'>
                    <label>
                        <p>B.</p>
                        <textarea placeholder="Enter choice" name="question[]">1</textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio" name='Is_answer' value='3'>
                    <label>
                        <p>C.</p>
                        <textarea placeholder="Enter choice" name="question[]">3</textarea>
                    </label>
                </div>
              
                <div class="answers">
                    <input type="radio" name='Is_answer' value='4'>
                    <label>
                        <p>D.</p>
                        <textarea placeholder="Enter choice" name="question[]">4</textarea>
                    </label>
                </div>
            </div>
        </div>
        </div>

        <button type="submit">Save Changes</button>
   </form>

   <script src="../js/Page/add_question.js"></script>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>