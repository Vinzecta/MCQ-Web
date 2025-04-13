<?php 
require_once "./database_connect.php";
require_once "./function.php";
if(isset($_GET["student_search"])) {
    $student_search = sanitize_input($_GET["student_search"]);
    if(!isset($_SESSION["sort_order"])) {
        $_SESSION["sort_order"] = '_';
    }
    if(!isset($_SESSION["sort_by"])) {
        $_SESSION["sort_by"] = '_';
    }
    $students_stmt = "";
    $student_query = "";
    $students_search_param = '%' . $student_search . '%';
    if(($_SESSION["sort_by"] == "User_name" ||  $_SESSION["sort_by"] == "Email") && $_SESSION["sort_order"] != "_") { // Enough sort categories selected
        $student_query = "SELECT 
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
                    Users.User_ID = Student.User_ID
                WHERE User_name LIKE ? OR Email LIKE ?
                ORDER BY ? ?";
        $students_stmt = $connection->prepare($student_query);
        $students_stmt->bind_param("ssss", $students_search_param, $students_search_param, $_SESSION["sort_by"], $_SESSION["sort_order"]);
    }
    else {
        $student_query = "SELECT 
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
                    Users.User_ID = Student.User_ID
                WHERE User_name LIKE ? OR Email LIKE ?";
        $students_stmt = $connection->prepare($student_query);
        $students_stmt->bind_param("ss", $students_search_param, $students_search_param);
    }
    $students_stmt->execute();
    $students_result = $students_stmt->get_result();
    if ($students_result->num_rows > 0) {  
        while($student = $students_result->fetch_assoc()) { 
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
                        echo '<button class="disable-button" type="submit" value="' . $student['User_ID'] . '" name="active">' . 'Active' . '</buton>';
                    }
                echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'No results found';
    }

}
else {
    echo 'No results found';
}