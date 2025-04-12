<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/question_management.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Ligma - Question Management</title>
</head>
<body>
    <?php
        require_once "./Components/header.php";
    ?>

    <h1 id="question-management">Questions Management</h1>

    <?php
        require_once "./Components/search_questions.php";

     
    // Display error
        if (isset($_SESSION['error_message'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']); // Clear the message after displaying it
        }
        if (isset($_SESSION['success_message'])) {
            echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
            unset($_SESSION['success_message']); // Clear the message after displaying it
        }
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        // if(!isset($_SESSION["page_number"])) {
        //     $_SESSION["page_number"] = 1;
        // }
        // if(!isset($_SESSION["sort_order"])) {
        //     $_SESSION["sort_order"] = '_';
        // }
        // if(!isset($_SESSION["sort_by"])) {
        //     $_SESSION["sort_by"] = '_';
        // }
        // if(!isset($_SESSION["sort_category"])) {
        //     $_SESSION["sort_category"] = '_';
        // }
        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";

        $_SESSION["page_number"] = isset($_GET["page_number"]) ? (int)$_GET["page_number"] :  1;
        if($_SESSION["page_number"] <= 0) {
            $_SESSION["page_number"] = 1;
        }

        $questions_per_page = 4;
        $num_adjacents_page = 2;
        $_SESSION["questions_per_page"] = $questions_per_page;
        $_SESSION["num_adjacents_page"] = $num_adjacents_page;

        // Calculate the offset to know which range of questions to retrieve
        $offset = ($_SESSION["page_number"] - 1) * $questions_per_page * 4;

        // count number of rows/questions
        $questions_query = "SELECT * FROM Question";
        $questions_query_result = $connection->query($questions_query);
        $total_questions = $questions_query_result->num_rows;
        $_SESSION["total_questions"] = $total_questions;
        $total_pages = ceil($total_questions / $questions_per_page);
        $_SESSION["total_pages"] = $total_questions;
        $rows_per_page = $questions_per_page * 4;
        $current_page_query = "SELECT 
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

        // Check if a sort category is set
        if ($_SESSION["sort_category"] != '_') {
            $current_page_query .= " WHERE Category = '" . $_SESSION["sort_category"] . "'";
        }

        // Append sorting and pagination
        $current_page_query .= ($_SESSION["sort_by"] != "_" && $_SESSION["sort_order"] != "_")
            ? " ORDER BY " . $_SESSION["sort_by"] . " " . $_SESSION["sort_order"] . " LIMIT $rows_per_page OFFSET $offset"
            : " LIMIT $rows_per_page OFFSET $offset";
        $current_page_result = $connection->query($current_page_query);
        function pagination($total_pages, $num_adjacents_page) {
            echo '<div id="pagination">';
                if ($_SESSION["page_number"] > 1) {
                    echo '<a href="index.php?page=question_management&page_number=' . ($_SESSION["page_number"] - 1) . '"><img src="../images/category/left_arrow.png" alt="left-arrow"></a>';
                }
                $min_display = max(1, $_SESSION["page_number"] - $num_adjacents_page);
                $max_display = min($total_pages, $_SESSION["page_number"] + $num_adjacents_page);
                for ($i = $min_display; $i <= $max_display; $i++) {
                    if ($i == $_SESSION["page_number"]) {
                        echo '<a id="main_page" class="pagination-number" href="index.php?page=question_management&page_number=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo '<a class="pagination-number" href="index.php?page=question_management&page_number=' . $i . '">' . $i . '</a> ';
                    }
                }
                if ($_SESSION["page_number"] < $total_pages) {
                    echo '<a href="index.php?page=question_management&page_number=' . ($_SESSION["page_number"] + 1) . '"><img src="../images/category/right_arrow.png" alt="right-arrow"></a>';
                }
            echo '</div>';
        }
    ?>

    <section id="question-selection">
        <?php 
        if ($current_page_result->num_rows > 0) { 
            while($question = $current_page_result->fetch_assoc()) { 
                echo '<div class="questions">';
                    echo '<p class="question-section">"' . $question['Question_name'] .'"</p>';
                    echo '<div class="question-information">';
                        echo '<div class="answers">';
                            echo '<p>A.</p>';
                            echo '<p>' . $question['Content'] . '</p>';
                        echo '</div>';
                        $question = $current_page_result->fetch_assoc();
                        echo '<div class="answers">';
                            echo '<p>B.</p>';
                            echo '<p>' . $question['Content'] . '</p>';
                        echo '</div>';
                        $question = $current_page_result->fetch_assoc();
                        echo '<div class="answers">';
                            echo '<p>C.</p>';
                            echo '<p>' . $question['Content'] . '</p>';
                        echo '</div>';
                        $question = $current_page_result->fetch_assoc();
                        echo '<div class="answers">';
                            echo '<p>D.</p>';
                            echo '<p>' . $question['Content'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="modify-section">';
                        echo '<a href="index.php?page=question_edit&question_id=' . $question['Question_ID'] . '">Edit</a>';
                        echo '<form method="POST" action="../logical/delete_questions.php" enctype="multipart/form-data">';
                            $_SESSION['delete_book_id'] = $question['Question_ID'];
                            echo '<input class="delete-question" type="submit" value="DELETE">';
                        echo '</form>';
                    echo '</div>';
                echo '</div>';
            }
        }
        ?>
        </div>
        
        <!--Pagination -->
        <!-- <div id="pagination">
            <a><img src="../images/category/left_arrow.png" alt="left-arrow"></a>
            <div class="pagination-list">
                <a class="pagination-number" id="main_page">1</a>
                <a class="pagination-number">2</a>
                <a class="pagination-number">3</a>
            </div>
            <a><img src="../images/category/right_arrow.png" alt="right-arrow"></a>
        </div> -->
        <?php pagination($total_pages, $num_adjacents_page); ?>
    </section>

    <!-- <script type="module" src="../js/Page/question_management.js"></script> -->
    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>