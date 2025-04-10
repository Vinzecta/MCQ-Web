<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
require_once "./database_connect.php";
require_once "./function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST["Email"]);
    $password = sanitize_input($_POST["Password"]);

    if ($email && $password) { 
        $check_email_query = "SELECT * FROM Users where Email = ?";
        $check_email_statement = $connection->prepare($check_email_query);
        $check_email_statement->bind_param("s", $email);
        $check_email_statement->execute();
        $result = $check_email_statement->get_result();
        #check email
        if ($result->num_rows > 0) {
            #check password
            $user = $result->fetch_assoc();
            $salt1 = "%$32*^";
            $salt2 = "fwfbgh#$()";
            $token = hash('ripemd128', "$salt1$password$salt2");
            if ($token == $user["Password_hash"]) { 
                
                $check_student_query = "SELECT * FROM Student where User_ID = ?";
                $check_admin_query = "SELECT * FROM Admins where User_ID = ?";

                $check_student_statement = $connection->prepare($check_student_query);
                $check_admin_statement = $connection->prepare($check_admin_query);

                $check_student_statement->bind_param("i", $user['User_ID']);
                $check_student_statement->execute();
                $student_result = $check_student_statement->get_result();

                $check_admin_statement->bind_param("i", $user['User_ID']);
                $check_admin_statement->execute();
                $admin_result = $check_admin_statement->get_result();

                if($student_result->num_rows == 1) {
                    $student = $student_result->fetch_assoc();
                    session_regenerate_id(true);
                    $_SESSION['User_ID'] = $user['User_ID'];
                    $_SESSION['User_name'] = $user['User_name'];
                    $_SESSION['Email'] = $user['Email'];
                    $_SESSION['PFP_URL'] = $user['PFP_URL'];
                    $_SESSION['Student_ID'] = $student['Student_ID'];
                    $_SESSION['is_admin'] = FALSE;
                    $_SESSION['Student_status'] = $student['Student_status'];
                }
                else {
                    $admin = $admin_result->fetch_assoc();
                    session_regenerate_id(true);
                    $_SESSION['User_ID'] = $user['User_ID'];
                    $_SESSION['User_name'] = $user['User_name'];
                    $_SESSION['Email'] = $user['Email'];
                    $_SESSION['PFP_URL'] = $user['PFP_URL'];
                    $_SESSION['Admin_ID'] = $student['Admin_ID'];
                    $_SESSION['is_admin'] = TRUE;
                }
                $connection->close();
                header("Location: $base_url/pages/index.php?page=landing_page");
            }
            else {
                $_SESSION['error_message'] = "Invalid passwords or email, try again.";
                $connection->close();
                header("Location: $base_url/pages/index.php?page=sign_in");
            }
        }
        else {
                $_SESSION['error_message'] = "Email has not been registered.";
                $connection->close();
                header("Location: $base_url/pages/index.php?page=sign_in");
        }
    }
}