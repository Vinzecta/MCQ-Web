<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/user_management.css">
    <title>Ligma - Users Management</title>
</head>
<body>
    <?php
        require_once "./Components/header.php";
    ?>

    <h1 id="users-management">Users Management</h1>

    <?php
        require_once "./Components/search_student.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(!isset($_SESSION['User_ID']) || $_SESSION['is_admin'] != TRUE) {
            header("Location: $base_url/pages/index.php?page=sign_in");
            exit;
        }
        $_SESSION["page_number"] = isset($_GET["page_number"]) ? (int)$_GET["page_number"] :  1;
        if($_SESSION["page_number"] <= 0) {
            $_SESSION["page_number"] = 1;
        }

        $students_per_page = 5;
        $num_adjacents_page = 2;
        $_SESSION["students_per_page"] = $students_per_page;
        $_SESSION["num_adjacents_page"] = $num_adjacents_page;

        // Calculate the offset to know which range of questions to retrieve
        $offset = ($_SESSION["page_number"] - 1) * $students_per_page;

        // count number of rows/questions
        $students_query = "SELECT * FROM Student";
        $students_query_result = $connection->query($students_query);
        $total_students = $students_query_result->num_rows;
        $_SESSION["total_students"] = $total_students;
        $total_pages = ceil($total_students / $students_per_page);
        $_SESSION["total_pages"] = $total_pages;
        $current_page_query = "SELECT 
                    Users.User_ID, 
                    Users.Email, 
                    Users.User_name, 
                    Users.PFP_URL, 
                    Student.Student_ID, 
                    Student.Student_status
                FROM 
                    Users
                JOIN 
                    Student 
                ON 
                    Users.User_ID = Student.User_ID";

        // Append sorting and pagination
        $current_page_query .= ($_SESSION["sort_by"] == "User_name" ||  $_SESSION["sort_by"] == "Email" && $_SESSION["sort_order"] != "_")
            ? " ORDER BY " . $_SESSION["sort_by"] . " " . $_SESSION["sort_order"] . " LIMIT $students_per_page OFFSET $offset"
            : " LIMIT $students_per_page OFFSET $offset";
        $current_page_result = $connection->query($current_page_query);
        function pagination($total_pages, $num_adjacents_page) {
            echo '<div id="pagination">';
                if ($_SESSION["page_number"] > 1) {
                    echo '<a href="index.php?page=user_management&page_number=' . ($_SESSION["page_number"] - 1) . '"><img src="../images/category/left_arrow.png" alt="left-arrow"></a>';
                }
                $min_display = max(1, $_SESSION["page_number"] - $num_adjacents_page);
                $max_display = min($total_pages, $_SESSION["page_number"] + $num_adjacents_page);
                for ($i = $min_display; $i <= $max_display; $i++) {
                    if ($i == $_SESSION["page_number"]) {
                        echo '<a id="main_page" class="pagination-number" href="index.php?page=user_management&page_number=' . $i . '">' . $i . '</a> ';
                    } else {
                        echo '<a class="pagination-number" href="index.php?page=user_management&page_number=' . $i . '">' . $i . '</a> ';
                    }
                }
                if ($_SESSION["page_number"] < $total_pages) {
                    echo '<a href="index.php?page=user_management&page_number=' . ($_SESSION["page_number"] + 1) . '"><img src="../images/category/right_arrow.png" alt="right-arrow"></a>';
                }
            echo '</div>';
        }
    ?>

    <section id="users">
        <?php 
            if ($current_page_result->num_rows > 0) { 
                while($student = $current_page_result->fetch_assoc()) { 
                    echo '<div class="user">';
                        echo '<img class="profile-image" src="' . $student['PFP_URL'] .'" alt="user">';
                        echo '<h3 class="username">' . $student['User_name'] . '</h3>';
                        echo '<div class="user-info">';
                            echo '<p>Email: <span>' . $student['Email'] . '</span></p>';
                        echo '</div>';
                        echo '<form method="POST" action="../logical/edit_student.php">';

                            if ($student['Student_status'] == 'active') {
                                echo '<button class="disable-button" type="submit" value="' . $student['User_ID'] . '" name="banned">' . 'Ban' . '</buton>';
                            }
                            else {
                                echo '<button class="disable-button active-button" type="submit" value="' . $student['User_ID'] . '" name="active">' . 'Active' . '</buton>';
                            }
                        echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<p style="text-align: center">Nothing to display!</p>';
            }
        ?>
    </section>

    <!--Pagination -->
    <div id="pagination">
        <?php pagination($total_pages, $num_adjacents_page); ?>
    </div>

    <script src="../js/Page/user_management.js"></script>

    <?php
        include "./pages/Components/footer.php";
    ?>
</body>
</html>