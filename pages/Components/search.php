<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION["page_number"])) {
    $_SESSION["page_number"] = 1;
}
if(!isset($_SESSION["sort_order"])) {
    $_SESSION["sort_order"] = '_';
}
if(!isset($_SESSION["sort_by"])) {
    $_SESSION["sort_by"] = '_';
}
require_once "../logical/database_connect.php";
require_once "../logical/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Component/search.css">
</head>
<body>
    <section id="search-bar">
        <input id="search" type="text" placeholder="Search" onkeyup="show_result_tests(this.value, <?php echo $_SESSION['page_number'];?>)">
    </section>

    <!-- <section id="sort-section">
        <div class="sort-area" id="sort-aspect">
            <p>Sort by</p>
            <select>
                <option>Average Grade</option>
                <option>Category</option>
                <option>Name</option>
                <option>No of Attempts</option>
            </select>
        </div>

        <div class="sort-area" id="sort-order">
            <p>Order</p>
            <select>
                <option>Ascending</option>
                <option>Descending</option>
            </select>
        </div>
    </section> -->
    <form id="sort-section" method="post" action="../logical/sort_form.php">
        <div class="sort-area" id="sort-aspect">
            <p>Sort by</p>
            <select name="sort_by">
                <option value="_" <?php echo ($_SESSION['sort_by'] == '_') ? 'selected' : ''; ?>>Sort by</option>
                <option value="Test_name" <?php echo ($_SESSION['sort_by'] == 'Test_name') ? 'selected' : ''; ?>>Test name</option>
                <option value="User_name" <?php echo ($_SESSION['sort_by'] == 'User_name') ? 'selected' : ''; ?>>Author name</option>
                <option value="Time_allowed" <?php echo ($_SESSION['sort_by'] == 'Time_allowed') ? 'selected' : ''; ?>>Time limit</option>
                <option value="Category" <?php echo ($_SESSION['sort_by'] == 'Category') ? 'selected' : ''; ?>>Category</option>
            </select>
        </div>

        <div class="sort-area" id="sort-order">
            <p>Order</p>
            <select name="sort_order">
                <option value="_" <?php echo ($_SESSION['sort_order'] == '_') ? 'selected' : ''; ?>>Sort order</option>
                <option value="ASC" <?php echo ($_SESSION['sort_order'] == 'ASC') ? 'selected' : ''; ?>>Ascending</option>
                <option value="DESC" <?php echo ($_SESSION['sort_order'] == 'DESC') ? 'selected' : ''; ?>>Descending</option>
            </select>
        </div>
        <input id="confirm_sort" type="submit" value="Sort" />
    </form>
    <script src="../js/live_search/live_search_tests.js"></script>
</body>
</html>