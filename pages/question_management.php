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
        include "./Components/header.php";
    ?>

    <h1 id="question-management">Questions Management</h1>

    <?php
        include "./Components/search_questions.php";
    ?>

    <section id="question-selection">
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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
        </div>

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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
        </div>

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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
        </div>

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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
        </div>

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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
        </div>

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
            
            <div class="modify-section">
                <a href="index.php?page=question_edit">Edit</a> <!-- Leads to question edit page with corresponding question id -->
                <p class="delete-question">Delete</p>
            </div>
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
    </section>

    <script type="module" src="../js/Page/question_management.js"></script>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>