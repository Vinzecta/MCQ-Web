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
    ?>

    <section class="categories">
        <div class="category-display">
            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

            <a class="category" href="index.php?page=edit_test">
                <div class="quiz-information">
                    <h3>Math</h3>
                    <div class="quiz-info">
                        <p>Author: abc</p>
                        <p>Day created: 01/02/2025</p>
                        <p>Category: Math</p>
                        <p>Total attempts: 100</p>
                        <p>Average grade: 80</p>
                    </div>
                </div>
            </a>  

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
        </div>
    </section>

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