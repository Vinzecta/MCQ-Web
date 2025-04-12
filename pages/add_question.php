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
        require_once "./Components/header.php";
        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";
    ?>

    <h1 id="question-title">Add Question</h1>

   <form id="question-area" enctype="multipart/form-data" method="POST" action="../logical/add_q_process.php">
        <!-- Category selection -->
        <div class="choose-category">
            <label>Choose a category</label>
            <select name='old_category'>
                <option value='Math'>Math</option>
                <option value='Physics'>Physics</option>
                <option value='Chemistry'>Chemistry</option>
                <option value='History'>History</option>
                <?php 
                $unique_category_query = "SELECT DISTINCT Category FROM Question";
                $categories = $connection->query($unique_category_query);
                if($categories->num_rows > 0) {
                    while($category = $categories->fetch_assoc()) { 
                        echo '<option value="' . $category['Category'] . '">' . $category['Category'] . '</option>';
                    }
                }
                ?>
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

            <textarea class="enter-question" name="question[]" placeholder="Enter question"></textarea>
            <div class="question-choice">
                <div class="answers">
                    <input type="radio" name='Is_answer' value='1'>
                    <label>
                        <p>A.</p>
                        <textarea placeholder="Enter choice" name="question[]"></textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio" name='Is_answer' value='2'>
                    <label>
                        <p>B.</p>
                        <textarea placeholder="Enter choice" name="question[]"></textarea>
                    </label>
                </div>

                <div class="answers">
                    <input type="radio" name='Is_answer' value='3'>
                    <label>
                        <p>C.</p>
                        <textarea placeholder="Enter choice" name="question[]"></textarea>
                    </label>
                </div>
              
                <div class="answers">
                    <input type="radio" name='Is_answer' value='4'>
                    <label>
                        <p>D.</p>
                        <textarea placeholder="Enter choice" name="question[]"></textarea>
                    </label>
                </div>
            </div>
        </div>

        <!-- <div id="more-question">
            <p>Add question</p>
        </div> -->

        <button type="submit">Submit</button>
        <?php 
        // Display error
            if (isset($_SESSION['error_message'])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
                unset($_SESSION['error_message']); // Clear the message after displaying it
            }
            if (isset($_SESSION['success_message'])) {
                echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
                unset($_SESSION['success_message']); // Clear the message after displaying it
            }
        ?>
        </div>
   </form>

   <script src="../js/Page/add_question.js"></script>

    <?php
        require_once "./Components/footer.php";
    ?>
</body>
</html>