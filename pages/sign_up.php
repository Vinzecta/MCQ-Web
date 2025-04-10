<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/sign_up.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Sign up</title>
</head>
<body>
    <form class="sign_in" method="post" action="../logical/signup_process.php">
        <p id="introduction">Let's sign you up!</p>
        <div class="input_box">
            <input type="text" placeholder="Username" id="username" name="Username">

            <!-- Username Validation -->
            <div class="alert alert-danger" role="alert" style="display: none">This field is required!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Username must not contain spaces!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Username must be between 8 - 30 characters</div>

            <input type="text" placeholder="Email" id="email" name="Email">

            <!--- Email Validation -->
            <div class="alert alert-danger" role="alert" style="display: none">This field is required!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Please enter a valid email address!</div>
            <?php 
            // Display error or success messages, if any
                if (isset($_SESSION['error_message'])) {
                    echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_message'] . "</div>";
                    unset($_SESSION['error_message']); // Clear the message after displaying it
                }
            ?>
            <input type="password" placeholder="Password" id="password" name="Password">

            <!--- Password Validation -->
            <div class="alert alert-danger" role="alert" style="display: none">This field is required!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Password must be between 8 - 30 characters!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Password must have at least 1 special character (!@#$)</div>
            <div class="alert alert-danger" role="alert" style="display: none">Password must have at least 1 uppercase character (A-Z)</div>

            <input type="password" placeholder="Confirm password" id="confirm" name="Confirm_password">
            
            <!-- Confirm password validation -->
            <div class="alert alert-danger" role="alert" style="display: none">This field is required!</div>
            <div class="alert alert-danger" role="alert" style="display: none">Password does not match!</div>
        </div>
        <div class="check_password">
            <input id="check" type="checkbox">
            See password
        </div>
        <button type="submit" id="sign_in_button">Sign up</button></b>
        <p id="or">or</p>
        <div class="social_image">
            <img src="../images/sign in/google.png" alt="google" id="google_icon">
            <img src="../images/sign in/facebook.png" alt="facebook" id="facebook_icon">
        </div>
        <p id="register">Have account? <a id="register_link" href="index.php?page=sign_in">Login Now</a></p>
    </form>
    <script type="module" src="../js/Page/sign_up.js"></script>

    <?php
        include "./Components/footer.php"
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>