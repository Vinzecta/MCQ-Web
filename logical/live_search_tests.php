<?php 
require_once "./database_connect.php";
require_once "./function.php";
if(isset($_GET["test_search"])) {
    $test_search = sanitize_input($_GET["test_search"]);
    if(!isset($_SESSION["sort_order"])) {
        $_SESSION["sort_order"] = '_';
    }
    if(!isset($_SESSION["sort_by"])) {
        $_SESSION["sort_by"] = '_';
    }
    $tests_stmt = "";
    $test_query = "";
    $tests_search_param = '%' . $test_search . '%';
    if(($_SESSION["sort_by"] == "Test_name" ||  $_SESSION["sort_by"] == "User_name" ||  $_SESSION["sort_by"] == "Category" || $_SESSION["sort_by"] == "Time_allowed") && $_SESSION["sort_order"] != "_") { // Enough sort categories selected
        $test_query = "SELECT 
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
                            Users ON Admins.User_ID = Users.User_ID
                        WHERE User_name LIKE ? OR Test_name LIKE ? OR Category LIKE ? OR Time_allowed LIKE ?
                        ORDER BY ? ?";
        $tests_stmt = $connection->prepare($test_query);
        $tests_stmt->bind_param("ssssss", $tests_search_param, $tests_search_param, $tests_search_param, $tests_search_param, $_SESSION["sort_by"], $_SESSION["sort_order"]);
    }
    else {
        $test_query = "SELECT 
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
                            Users ON Admins.User_ID = Users.User_ID
                        WHERE User_name LIKE ? OR Test_name LIKE ? OR Category LIKE ? OR Time_allowed LIKE ?";
        $tests_stmt = $connection->prepare($test_query);
        $tests_stmt->bind_param("ssss", $tests_search_param, $tests_search_param, $tests_search_param, $tests_search_param);
    }
    $tests_stmt->execute();
    $tests_result = $tests_stmt->get_result();
    if ($tests_result->num_rows > 0) {  
        while($test = $tests_result->fetch_assoc()) { 
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
        echo 'No results found';
    }

}
else {
    echo 'No results found';
}