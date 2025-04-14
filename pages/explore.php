<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/explore.css">
    <title>Ligma - Explore</title>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        require_once "./Components/header.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
            header("Location: $base_url/pages/index.php?page=you_have_been_banned");
            exit;
        }
        require_once "../logical/database_connect.php";
        require_once "../logical/function.php";
    ?>

    <!-- Search bar -->
    <!-- <section id="search-bar">
        <input id="search" type="text" placeholder="Search">
        <img src="../images/explore/search.png" alt="Search icon">
    </section> -->

    <!-- <section id="popular">
        <div class="category-title" id="popular-quiz">
            <h1>Top popular quizzes</h1>
        </div>

        <div id="popular-category">
            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>1</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>  

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>2</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>3</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>  
            
            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>4</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>5</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>6</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>7</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>8</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>9</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   

            <a class="pop-quiz">
                <div class="popular-content">
                    <h1>10</h1>
                </div>
                <div class="pop-content">
                    <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempts: <span>100</span></p>
                    </div>
                </div>
            </a>   
        </div>
    </section> -->

    <section class="categories">
        <div class="category-title">
            <h1>Categories</h1>
        </div>  
        
        <div class="category-display">
            <?php 
            $unique_category_query = "SELECT DISTINCT Category FROM Test ORDER BY RAND() LIMIT 8;";
            $categories = $connection->query($unique_category_query);
            if($categories->num_rows > 0) {
                while($category = $categories->fetch_assoc()) { 
                    echo '<a class="category" href="index.php?page=quiz&category=' . $category['Category'] . '">';
                        echo '<p>' . $category['Category'] . '</p>';
                    echo '</a>';
                }
            }
            ?>
        </div>
    </section>

    <?php 
        $unique_category_query = "SELECT DISTINCT Category FROM Test ORDER BY RAND() LIMIT 8;";
        $categories = $connection->query($unique_category_query);
            if($categories->num_rows > 0) {
                while($category = $categories->fetch_assoc()) { 
                    $test_query = "SELECT * FROM Test WHERE Category = '" . $category['Category'] . "' ;";
                    $test_result = $connection->query($test_query);
                    if($test_result->num_rows > 0) {
                        echo '<section class="categories">';
                            echo '<div class="category-title">';
                                echo '<h1>' . $category['Category'] . '</h1>';
                                echo '<a href="index.php?page=quiz&category=' . urlencode($category['Category']) . '">View all</a>';
                            echo '</div>'; 
                            echo '<div class="category-display">';
                        while ($test = $test_result->fetch_assoc()) { 
                            echo '<a class="category" href="index.php?page=quiz_detail&quiz_id=' . $test['Test_ID'] . '">';
                                echo '<div class="quiz-information">';
                                        echo '<h3>' . $test['Test_name'] . '</h3>';
                                        echo '<p>Time allowed:</p>';
                                        echo '<p class="total-attempts">' . $test['Time_allowed'] . '</p>';
                                echo '</div>';
                            echo '</a>';
                        }
                            echo '</div>';
                        echo '</section>';
                    }
                }
            }
    ?>
    

    <?php
        require_once "./Components/footer.php";
    ?>

    <!-- <script src="../js/Page/explore.js"></script> -->
</body>
</html>