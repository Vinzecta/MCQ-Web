<!-- Dynamic url display for different section -->
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
    $display = isset($_GET['account_display']) && in_array($_GET['account_display'], array('profile', 'history', 'reset_password')) ? $_GET['account_display'] : 'profile';
    if(!isset($_SESSION['User_ID'])) {
        header("Location: $base_url/pages/index.php?page=sign_in");
    }
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
    if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
        header("Location: $base_url/pages/index.php?page=you_have_been_banned");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/account.css">
    <title>Ligma - Profile</title>
</head>
<body>
    <?php 
        require_once "./Components/header.php";
    ?>

    <section id="profile">
        <div id="left-profile">
            <div class="list-container" id="my-account">
                <div class="profile-pic">
                    <img src="../images/account/user.png">
                </div>
                <a href="index.php?page=account&account_display=profile">My Profile</a>
            </div>
            <div class="list-container" id="purchase-history">
                <div class="profile-pic">
                    <img src="../images/account/user.png">
                </div>
                <a href="index.php?page=account&account_display=history">Purchase History</a>
            </div>
            <div class="list-container" id="reset-password">
                <div class="profile-pic">
                    <img src="../images/account/user.png">
                </div>
                <a href="index.php?page=account&account_display=reset_password">Reset Password</a>
            </div>
        </div>
        <div id="right-profile">
            <?php if ($display == 'profile'):  ?>
                <div class="right-content" id="right-account">
                    <div id="right-account-title">
                        <h1>My account</h1>
                    </div>
                    <form id="edit-profile" enctype="multipart/form-data" action="../logical/change_pfp.php" method="POST">
                        <div id="image-edit">
                            <?php echo '<img id="user-image" src="' . $_SESSION['PFP_URL'] .'" alt="user">';?>
                            <input id="file-upload" name="pfp_image" type="file" accept=".jpg, .png">
                        </div>
                        <?php 
                        // Display error
                            if (isset($_SESSION['error_message'])) {
                                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
                                unset($_SESSION['error_message']); // Clear the message after displaying it
                            }
                            if (isset($_SESSION['success_message'])) {
                                echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
                                unset($_SESSION['success_message']); // Clear the message after displaying it
                            }
                        ?>
                        <label>Username</label>
                        <?php echo '<input type="text" value="' . $_SESSION['User_name'] .'" disabled readonly>';?>
                        <p style="text-align: center; padding: 0">You cannot change the username</p>
                        <label>Email</label>
                        <?php echo '<input type="text" value="' . $_SESSION['Email'] . '" disabled readonly>';?>
                        <p style="text-align: center; padding: 0">You cannot change the email</p>
                        <!-- <label>Phone number</label>
                        <input type="number" id="phone_number" name="phone_number" value="01234567">
                            
                        <div class="alert alert-profile" style="display: none">
                            <p>Phone number must be 10-11 numbers!</p>
                        </div>
                        <label>Gender</label>
                        <div id="gender">
                            <input type="radio" name="gender" value="male">
                            <label>Male</label>
                            <input type="radio" name="gender" value="female">
                            <label>Female</label>
                            <input type="radio" name="gender" value="other">
                            <label>Other</label>
                        </div>
                        <label>Date of birth</label>
                        <input type="date" name="birthdate"> -->
                        <button id="save-profile" class="change-profile" type="submit">Save changes</button>
                    </form>
                    <form id="log-out" action="../logical/log_out.php">
                            <button id="log-out-button" class="change-profile" type="submit">Log out</button>
                    </form>
                </div>
                <script src="../js/Page/profile_validation.js"></script>
            <?php elseif ($display == 'history'): ?>
                <div class="right-content" id="right-history">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Exam Name</th>
                            <th>Grade</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                        </tr>
                    </table>
                </div>
            <?php elseif ($display == 'reset_password'): ?>
                <div class="right-content" id="right-reset">
                    <div id="right-reset-title">
                        <h1>Reset password</h1>
                    </div>
                    <form id="reset-pass" method="post" action="../logical/reset_pass.php">
                        <label>New password</label>
                        <input id="profile-password" type="password" class="password" name="password" placeholder="Enter new password">
                        <div class="alert alert-profile" style="display: none">
                            <p>This field is required!</p>
                        </div>
                        <label>Re-type password</label>
                        <input id="profile-re-password" type="password" class="password" name="Re-type-password" placeholder="Re-type password">
                        <div class="alert alert-profile" style="display: none">
                            <p>This field is required!</p>
                        </div>
                        <div class="alert alert-profile" style="display: none">
                            <p>Password does not match!</p>
                        </div>
                        <div class="show-password">
                            <input id="profile-show" type="checkbox" class="pass-show" value="yes">
                            <p>Show password</p>
                        </div>
                        <?php 
                        if (isset($_SESSION['error_message'])) {
                            echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
                            unset($_SESSION['error_message']); // Clear the message after displaying it
                        }
                        if (isset($_SESSION['success_message'])) {
                            echo "<div class='success'><p>" . $_SESSION['success_message'] . "</p></div>";
                            unset($_SESSION['success_message']); // Clear the message after displaying it
                        }
                        ?>
                        <button id="change-pass-button" class="change-profile" type="submit">Save changes</button>
                    </form>
                    <script src="../js/Page/profile_password_validation.js"></script>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php
        require_once "./Components/footer.php";
    ?>
</body>
</html>