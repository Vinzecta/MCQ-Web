<!-- Dynamic url display for different section -->
<?php
    $display = isset($_GET['account_display']) && in_array($_GET['account_display'], array('profile', 'history', 'reset_password')) ? $_GET['account_display'] : 'profile';
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
        include "./Components/header.php";
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
                    <form id="edit-profile" enctype="multipart/form-data">
                        <div id="image-edit">
                            <img id="user-image" src="../images/account/user.png" alt="user">
                            <input id="file-upload" name="image" type="file" accept=".jpg,.png">
                        </div>
                        <label>Username</label>
                        <input type="text" value="Username" disabled readonly>
                        <p style="text-align: center; padding: 0">You cannot change the username</p>
                        <label>Email</label>
                        <input type="text" value="Email" disabled readonly>
                        <p style="text-align: center; padding: 0">You cannot change the email</p>
                        <label>Phone number</label>
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
                        <input type="date" name="birthdate">
                        <button id="save-profile" class="change-profile" type="submit">Save changes</button>
                    </form>
                    <form id="log-out" action="../Backend/log_out.php">
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
                    <form id="reset-pass" method="post" action="../Backend/reset_pass.php">
                        <label>New password</label>
                        <input id="profile-password" type="password" class="password" name="password" placeholder="Enter new password">
                        <div class="alert alert-profile" style="display: none">
                            <p>This field is required!</p>
                        </div>
                        <label>Re-type password</label>
                        <input id="profile-re-password" type="password" class="password" placeholder="Re-type password">
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
                        <button id="change-pass-button" class="change-profile" type="submit">Save changes</button>
                    </form>
                    <script src="../js/Page/profile_password_validation.js"></script>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>