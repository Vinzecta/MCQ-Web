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
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        require_once "./Components/header.php";
        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";
        $question_id = sanitize_input($_GET['question_id']);
        if(filter_var($question_id, FILTER_VALIDATE_INT) == FALSE || (int) $question_id < 0) {
            $_SESSION['error_message'] = 'Invalid input. Try again';
            header("Location: $base_url/pages/index.php?page=question_management");
            exit;
        }

        $question_query = "SELECT 
                    Question.Question_ID, 
                    Question.Question_name, 
                    Question.Category, 
                    Question.Question_URL, 
                    Choice.Choice_Number, 
                    Choice.Content,
                    Choice.Is_answer
                FROM 
                    Question
                JOIN 
                    Choice 
                ON 
                    Question.Question_ID = Choice.Question_ID
                WHERE Question.Question_ID = '$question_id'";
        $_SESSION['edit_question_id'] = $question_id;

        $question_result = $connection->query($question_query);
        if($question_result->num_rows == 0) {
            $_SESSION['error_message'] = 'Invalid input. Try again';
            header("Location: $base_url/pages/index.php?page=question_management");
            exit;
        }
        $question = $question_result->fetch_assoc();
        $_SESSION['edit_question_url'] = $question['Question_URL'];
    ?>

    <h1 id="question-edit">Question Information</h1>

    <form id="question-area" enctype="multipart/form-data" method="POST" action="../logical/edit_q_process.php">
        <!-- Category selection -->
        <div class="choose-category">
            <label>Category</label>
            <select name='old_category'>
                <option value='Math'>Math</option>
                <option value='Physics'>Physics</option>
                <option value='Chemistry' selected>Chemistry</option>
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
                    <img id="question-image" src="<?php echo $question['Question_URL']; ?>">
                    <p>Supported formats: JPEG, PNG, GIF (Max size: 2MB).</p>
                </label>
                <input id="file-upload" type="file" accept=".jpeg, .png, .gif, .jpg" name="Question_image">
            </div>

            <textarea class="enter-question" name="question[]"><?php echo $question['Question_name']; ?></textarea>
            <div class="question-choice">
                <div class="answers">
                    <input type="radio" name='Is_answer' value='1' <?php echo ($question['Is_answer'])? 'checked' : ''; ?>>
                    <label>
                        <p>A.</p>
                        <textarea placeholder="Enter choice" name="question[]"><?php echo $question['Content'] ?></textarea>
                    </label>
                </div>
                <?php $question = $question_result->fetch_assoc() ?>
                <div class="answers">
                    <input type="radio" name='Is_answer' value='2' <?php echo ($question['Is_answer'])? 'checked' : ''; ?>>
                    <label>
                        <p>B.</p>
                        <textarea placeholder="Enter choice" name="question[]"><?php echo $question['Content'] ?></textarea>
                    </label>
                </div>
                <?php $question = $question_result->fetch_assoc() ?>
                <div class="answers">
                    <input type="radio" name='Is_answer' value='3'<?php echo ($question['Is_answer'])?  'checked' : ''; ?>>
                    <label>
                        <p>C.</p>
                        <textarea placeholder="Enter choice" name="question[]"><?php echo $question['Content'] ?></textarea>
                    </label>
                </div>
                <?php $question = $question_result->fetch_assoc() ?>
                <div class="answers">
                    <input type="radio" name='Is_answer' value='4'<?php echo ($question['Is_answer'])? 'checked' : ''; ?>>
                    <label>
                        <p>D.</p>
                        <textarea placeholder="Enter choice" name="question[]"><?php echo $question['Content'] ?></textarea>
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