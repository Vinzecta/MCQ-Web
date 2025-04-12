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
        require_once "./Components/header.php";
        require_once "../logical/database_connect.php";
    ?>

    <section id="add-test-instruction">
        <h1>Add Test</h1>
        <p>Please fill the information in the form below to create a test!</p>
    </section>

    <?php if ($info == "basic") {
            echo '<form id="test-information" method="POST" action="../logical/add_test_process.php">';
                echo '<h2>Test Information</h2>';

                echo '<label>Test Name</label>';
                echo '<input id="test-name" type="text" placeholder="Enter the test name" name ="test_name">';

                echo '<label>Category</label>';
                echo '<select id="test-category" class="search-dropdown" name="test_category">';
                    
                    
                echo '</select>';

                echo '<label>Description</label>';
                echo '<textarea id="test-description" placeholder="Enter the test description" name="test_description"></textarea>';

                echo '<label>Time Limit (in minutes and type integer)</label>';
                echo '<input type="number" name="test_time_limit">';

                
                echo '<button type="submit">Next Step</button>';
            echo '</form>';
        }
        else {
            // display question list
            if (!isset($_SESSION['selected_questions'])) {
                $_SESSION['selected_questions'] = [];
            }

            require_once "./Components/search.php";
            // first display questions with same categorys
            // add sort and search function with ajax
            // each question displayed have a check box with value of that question id
            // if checked add to array, if unchecked removed array
            // done chosing sent to another file to process and create tests

        }
    ?>
    
    <!-- Add questions -->
    <h1 id="select-question">Select Questions</h1>

    <!-- Delete this after done above -->
    <form id="question-selection">
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
        </div>
        
        <!--Pagination -->
        <div id="pagination">
            <a><img src="../images/category/left_arrow.png" alt="left-arrow"></a>
            <div class="pagination-list">
                <a class="pagination-number"><p>1</p></a>
                <a class="pagination-number"><p>2</p></a>
                <a class="pagination-number"><p>3</p></a>
            </div>
            <a><img src="../images/category/right_arrow.png" alt="right-arrow"></a>
        </div>
        <button type="submit">Add Test</button>
    </form>


    <?php
        require_once "./Components/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script> <!-- For search category-->
</body>
</html>