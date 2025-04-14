<!--Dynamic URL for different step of input test information -->
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['info'])) {
        $_SESSION['info'] = 'basic';
    }
    $info = $_SESSION['info'];
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
    if(!isset($_SESSION['User_ID'])) {
        header("Location: $base_url/pages/index.php?page=sign_in");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/add_test.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/> <!-- For search category-->

    <title>Ligma - Add Test</title>
</head>
<body>
    <?php
        require_once "./pages/Components/header.php";
        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";
    ?>

    <section id="add-test-instruction">
        <h1>Add Test</h1>
        <p>Please fill the information in the form below to create a test!</p>
    </section>

    <?php 
    if (isset($_SESSION['error_message'])) {
        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']); // Clear the message after displaying it
    }
    if (isset($_SESSION['success_message'])) {
        echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
        unset($_SESSION['success_message']); // Clear the message after displaying it
    }
if($info == 'basic') {
    echo '<form id="test-information" method="POST" action="../logical/add_test_step1.php">';
        echo '<h2>Test Information</h2>';
        echo '<label>Test Name</label>';
        echo '<input id="test-name" type="text" placeholder="Enter the test name" name ="test_name">';
        echo '<label>Category</label>';
        echo '<select id="test-category" class="search-dropdown" name="test_category">';
            echo '<option value="All">All</option>';
            $unique_category_query = "SELECT DISTINCT Category FROM Question";
            $categories = $connection->query($unique_category_query);
            if($categories->num_rows > 0) {
                while($category = $categories->fetch_assoc()) { 
                    echo '<option value="' . $category['Category'] . '">' . $category['Category'] . '</option>';
                }
            }
        echo '</select>';
        echo '<label>Description</label>';
        echo '<textarea id="test-description" placeholder="Enter the test description" name="test_description"></textarea>';
        echo '<label>Time Limit (in minutes and type integer)</label>';
        echo '<input type="number" name="test_time_limit">';
        
        echo '<button type="submit">Next Step</button>';
    echo '</form>';

    
}
else {
    echo '<h1 id="select-question">Select Questions</h1>';
    echo '<form id="question-selection" method="post" action="../logical/add_test_step2.php">';
    $category = $_SESSION['test_category'];
    $base_query = "SELECT 
                    Question.Question_ID, 
                    Question.Question_name, 
                    Question.Category, 
                    Question.Question_URL, 
                    Choice.Choice_Number, 
                    Choice.Content
                FROM 
                    Question
                JOIN 
                    Choice 
                ON 
                    Question.Question_ID = Choice.Question_ID";
    $questions_query = ($category == 'All') 
    ? $base_query . ";"
    : $base_query . " WHERE Question.Category = '$category' OR Question.Category LIKE '%$category%';";

    $questions = $connection->query($questions_query);
    if($questions->num_rows > 0) {
        while($question = $questions->fetch_assoc()) { 
            echo '<div class="questions">';
                echo '<p class="question-section">"' . $question['Question_name'] .'"</p>';
                echo '<div class="question-information">';
                    echo '<div class="answers">';
                        echo '<p>A.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>B.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>C.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                    $question = $questions->fetch_assoc();
                    echo '<div class="answers">';
                        echo '<p>D.</p>';
                        echo '<p>' . $question['Content'] . '</p>';
                    echo '</div>';
                echo '</div>';
                echo '<input id="accept-question" type="checkbox" value="' . $question['Question_ID'] . '" name="Question_' . $question['Question_ID'] . '">';
            echo '</div>';
        }
    }
        echo '<button type="submit">Add Test</button>';
    echo '</form>';
    if (isset($_SESSION['error_message'])) {
        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']); // Clear the message after displaying it
    }
    if (isset($_SESSION['success_message'])) {
        echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
        unset($_SESSION['success_message']); // Clear the message after displaying it
    }
}
    ?>
    
    <!-- Add questions -->
    <!-- <h1 id="select-question">Select Questions</h1> -->

    <!-- Delete this after done above -->
    <!-- <form id="question-selection">
        <div class="questions">
            <p class="question-section">What is 1 + 1?</p>
            <div class="question-information">
                <div class="answers">
                    <p>A.</p>
                    <p>1</p>
                </div>

                <div class="answers">
                    <p>B.</p>
                    <p>2</p>
                </div>

                <div class="answers">
                    <p>C.</p>
                    <p>3</p>
                </div>

                <div class="answers">
                    <p>D.</p>
                    <p>4</p>
                </div> 
            </div>
            <input id="accept-question" type="checkbox">
        </div> -->
        
        <!--Pagination -->
        <!-- <div id="pagination">
            <a><img src="../images/category/left_arrow.png" alt="left-arrow"></a>
            <div class="pagination-list">
                <a class="pagination-number"><p>1</p></a>
                <a class="pagination-number"><p>2</p></a>
                <a class="pagination-number"><p>3</p></a>
            </div>
            <a><img src="../images/category/right_arrow.png" alt="right-arrow"></a>
        </div> -->
        <!-- <button type="submit">Add Test</button> -->
    <!-- </form> -->


    <?php
        require_once "./pages/Components/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script> <!-- For search category-->
</body>
</html>