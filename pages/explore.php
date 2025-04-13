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
        require_once "./Components/header.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
            header("Location: $base_url/pages/index.php?page=you_have_been_banned");
            exit;
        }
    ?>

    <!-- Search bar -->
    <section id="search-bar">
        <input id="search" type="text" placeholder="Search">
        <img src="../images/explore/search.png" alt="Search icon">
    </section>

    <section id="popular">
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
    </section>

    <section class="categories">
        <div class="category-title">
            <h1>Categories</h1>
            <a href="index.php?page=category">View all</a>
        </div>  

        <div class="category-display">
            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>

            <a class="category">
                
                <p>Math</p>
            </a>  
        </div>
    </section>

    <section class="categories">
        <div class="category-title">
            <h1>Math</h1>
            <a href="index.php?page=quiz">View all</a>
        </div>  

        <div class="category-display">
            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>  
        </div>
    </section>

    <section class="categories">
        <div class="category-title">
            <h1>Chemistry</h1>
            <a href="index.php?page=category">View all</a>
        </div>  

        <div class="category-display">
            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>  
        </div>
    </section>

    <section class="categories">
        <div class="category-title">
            <h1>Math</h1>
            <a href="index.php?page=category">View all</a>
        </div>  

        <div class="category-display">
            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>

            <a class="category">
                
                <div class="quiz-information">
                        <h3>Math</h3>
                        <p>Total attempt:</p>
                        <p class="total-attempts">100</p>
                </div>
            </a>  
        </div>
    </section>

    <?php
        require_once "./Components/footer.php";
    ?>

    <script src="../js/Page/explore.js"></script>
</body>
</html>