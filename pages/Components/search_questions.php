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
if(!isset($_SESSION["sort_category"])) {
    $_SESSION["sort_category"] = '_';
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
        <input id="search" type="text" placeholder="Search">
        <img src="../images/explore/search.png" alt="Search icon">
    </section>

    <form id="sort-section" method="post" action="../logical/sort_form.php">
        <div class="sort-area" id="sort-aspect">
            <p>Sort by</p>
            <select name="sort_by">
                <option value="_" <?php echo ($_SESSION['sort_by'] == '_') ? 'selected' : ''; ?>>Sort by</option>
                <option value="Question_name" <?php echo ($_SESSION['sort_by'] == 'Question_name') ? 'selected' : ''; ?>>Name</option>
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

        <div class="sort-area">
            <p>Categories</p>
            <select name = "sort_category">
                <option value="_" <?php echo ($_SESSION['sort_category'] == '_') ? 'selected' : ''; ?>>Sort category</option>
            <?php 
                $unique_category_query = "SELECT DISTINCT Category FROM Question";
                $categories = $connection->query($unique_category_query);
                if ($categories->num_rows > 0) {
                    while ($category = $categories->fetch_assoc()) { 
                        echo '<option value="' . $category['Category'] . '" ' . 
                            (($_SESSION['sort_category'] == $category['Category']) ? 'selected' : '') . 
                            '>' . $category['Category'] . '</option>';
                    }
                }                
            ?>
            </select>
        </div>
        <input id="confirm_sort" type="submit" value="Sort" />
    </form>
</body>
</html>