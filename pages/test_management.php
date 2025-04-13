<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/test_management.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Ligma - Tests Management</title>
</head>
<body>
    <?php
        require_once ("./Components/header.php");
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(!isset($_SESSION['User_ID']) || $_SESSION['is_admin'] != TRUE) {
            header("Location: $base_url/pages/index.php?page=sign_in");
            exit;
        }
    ?>

    <h1 id="test-management">Test Management</h1>

    <?php
        require_once ("./Components/search.php");
        $_SESSION["page_number"] = isset($_GET["page_number"]) ? (int)$_GET["page_number"] :  1;
        if($_SESSION["page_number"] <= 0) {
            $_SESSION["page_number"] = 1;
        }

        $tests_per_page = 6;
        $num_adjacents_page = 2;
        $_SESSION["tests_per_page"] = $tests_per_page;
        $_SESSION["num_adjacents_page"] = $num_adjacents_page;

        // Calculate the offset to know which range of questions to retrieve
        $offset = ($_SESSION["page_number"] - 1) * $tests_per_page;

        // count number of rows/questions
        $tests_query = "SELECT * FROM Test";
        $tests_query_result = $connection->query($tests_query);
        $total_tests = $tests_query_result->num_rows;
        $_SESSION["total_tests"] = $total_tests;
        $total_pages = ceil($total_tests / $tests_per_page);
        $_SESSION["total_pages"] = $total_pages;
        $current_page_query = "SELECT 
                                Users.User_name,
                                Test.Test_ID,
                                Test.Test_name,
                                Test.Time_allowed,
                                Test.Category
                            FROM 
                                Test
                            JOIN 
                                Admins ON Test.Admin_ID = Admins.Admin_ID
                            JOIN 
                                Users ON Admins.User_ID = Users.User_ID";

        // Append sorting and pagination
        $current_page_query .= (($_SESSION["sort_by"] == "Test_name" ||  $_SESSION["sort_by"] == "User_name" ||  $_SESSION["sort_by"] == "Category" || $_SESSION["sort_by"] == "Time_allowed") && $_SESSION["sort_order"] != "_")
            ? " ORDER BY " . $_SESSION["sort_by"] . " " . $_SESSION["sort_order"] . " LIMIT $tests_per_page OFFSET $offset"
            : " LIMIT $tests_per_page OFFSET $offset";
        $current_page_result = $connection->query($current_page_query);
        function pagination($total_pages, $num_adjacents_page) {
            echo '<div id="pagination">';
                if ($_SESSION["page_number"] > 1) {
                    echo '<a href="index.php?page=test_management&page_number=' . ($_SESSION["page_number"] - 1) . '"><img src="../images/category/left_arrow.png" alt="left-arrow"></a>';
                }
                $min_display = max(1, $_SESSION["page_number"] - $num_adjacents_page);
                $max_display = min($total_pages, $_SESSION["page_number"] + $num_adjacents_page);
                for ($i = $min_display; $i <= $max_display; $i++) {
                    if ($i == $_SESSION["page_number"]) {
                        echo '<a id="main_page" class="pagination-number" href="index.php?page=test_management&page_number=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo '<a class="pagination-number" href="index.php?page=test_management&page_number=' . $i . '">' . $i . '</a> ';
                    }
                }
                if ($_SESSION["page_number"] < $total_pages) {
                    echo '<a href="index.php?page=test_management&page_number=' . ($_SESSION["page_number"] + 1) . '"><img src="../images/category/right_arrow.png" alt="right-arrow"></a>';
                }
            echo '</div>';
        }
    ?>

    <section class="categories">
        
        <div class="category-display">
            <?php 
                if ($current_page_result->num_rows > 0) { 
                    while($test = $current_page_result->fetch_assoc()) { 
                        echo '<a class="category" href="index.php?page=edit_test">';
                            echo '<div class="quiz-information">';
                                echo '<h3>' . $test['Test_name'] . '</h3>';
                                echo '<div class="quiz-info">';
                                    echo '<p>Author: ' . $test['User_name'] . '</p>';
                                    echo '<p>Category: ' . $test['Category'] . '</p>';
                                    echo '<p>Time limits: ' . $test['Time_allowed'] . ' minutes</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo '<p>Nothing to display!</p>';
                }
            ?>

            <!--Pagination -->
            
        </div>
        

    </section>
    <div id="pagination">
        <?php pagination($total_pages, $num_adjacents_page); ?>
    </div>
    <?php
        require_once ("./Components/add_section.php");
    ?>

    <script src="../js/Page/category.js"></script>
    <script src="../js/Page/explore.js"></script>

    <?php
        require_once ("./Components/footer.php");
    ?>
</body>
</html>