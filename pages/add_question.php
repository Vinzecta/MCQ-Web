<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/add_question.css">
    <title>Ligma - Add Question</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

    <h1 id="question-title">Add Question</h1>

   <form id="question-area" enctype="multipart/form-data">
        <!-- Category selection -->
        <div class="choose-category">
            <label>Choose a category</label>
            <select>
                <option>Math</option>
                <option>Physics</option>
                <option>Chemistry</option>
            </select>
            <p id="a-new-category">Have a new category? <span id="add-category">Click here!</span></p>
            <input id="new-category" placeholder="Enter new category" style="display: none">
        </div>

        <!-- Question selection -->
        <div class="questions">
            <!-- Image upload -->
            <div class="image-upload">
                <label class="image-label">
                    <img id="question-image" src="../images/add_question/image.png">
                    <p>Supported formats: JPEG, PNG, GIF (Max size: 2MB).</p>
                </label>
                <input id="file-upload" type="file" accept=".jpeg,.png,.gif">
            </div>

            <textarea class="enter-question" name="question[]" placeholder="Enter question"></textarea>
            <div class="question-choice">
                <div class="answers">
                    <input type="radio">
                    <label>
                        <p>A.</p>
                        <textarea placeholder="Enter choice"></textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio">
                    <label>
                        <p>B.</p>
                        <textarea placeholder="Enter choice"></textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio">
                    <label>
                        <p>C.</p>
                        <textarea placeholder="Enter choice"></textarea>
                    </label>
                </div>
              
                <div class="answers">
                    <input type="radio">
                    <label>
                        <p>D.</p>
                        <textarea placeholder="Enter choice"></textarea>
                    </label>
                </div>
            </div>
        </div>

        <div id="more-question">
            <p>Add question</p>
        </div>

        <button type="submit">Submit</button>
   </form>

   <script src="../js/Page/add_question.js"></script>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>