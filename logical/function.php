<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function add_student($connection, $email, $user_name, $password)
{
    $query = "INSERT INTO Users (Email, User_name, Password_hash, PFP_URL) VALUES (?, ?, ?, ?)";
    $statement = $connection->prepare($query);
    $pfp_url = "../images/account/user.png";
    $statement->bind_param("ssss", $email, $user_name, $password, $pfp_url);
    $statement->execute();

    $new_user_id = $connection->insert_id;
    $student_status = "active";
    $insert_student_query = "INSERT INTO Student (User_ID, Student_status) VALUES (?, ?)";
    $insert_student_stmt = $connection->prepare($insert_student_query);
    $insert_student_stmt->bind_param("is", $new_user_id, $student_status);
    $insert_student_stmt->execute();
}