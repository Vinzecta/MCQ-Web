<!--Dynamic URL for different step of input test information -->
<?php
    $info = isset($_GET["info"]) && in_array($_GET["info"], array("basic", "questions")) ? $_GET["info"] : "basic";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/add_test.css">
    <title>Ligma - Add Test</title>
</head>
<body>
    <?php
        include "./Components/header.php"
    ?>

    <section id="add-test-instruction">
        <h1>Add Test</h1>
        <p>Please fill the information in the form below to create a test!</p>
    </section>

    <?php if ($info == "basic"): ?>
        <form id="test-information">
            <h2>Test Information</h2>

            <label>Test Name</label>
            <input id="test-name" type="text" placeholder="Enter the test name">

            <label>Category</label>
            <select id="test-category">
                <option>Math</option>
                <option>Physics</option>
                <option>Chemistry</option>
            </select>

            <label>Description</label>
            <textarea id="test-description" placeholder="Enter the test description"></textarea>

            <label>Time Limit</label>
            <input type="time">

            <button type="submit">Next Step</button> <!-- Leads to index.php?page=add_test&info=questions&category= -->
        </form>
    <?php else: ?>
        <?php
            include "./Components/search.php";
        ?>

        <form id="question-selection">
            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a> <!-- Navigate to index.php?page=question_detail -->
                    <input type="checkbox">
                </div>
            </div>

            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a>
                    <input type="checkbox">
                </div>
            </div>

            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a>
                    <input type="checkbox">
                </div>
            </div>

            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a>
                    <input type="checkbox">
                </div>
            </div>

            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a>
                    <input type="checkbox">
                </div>
            </div>

            <div class="questions">
                <p class="question-section">What is 1 + 1?</p>
                <div class="question-information">
                    <a>View</a>
                    <input type="checkbox">
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
        </form>
    <?php endif; ?>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>