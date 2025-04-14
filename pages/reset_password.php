<!-- Reset password site -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/reset_password.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Reset password</title>
 </head>
 <body>
    <form class="sign_in">
        <p id="introduction">Forgot Password</p>
        <!-- Error message for backend (if neccessary)
        <div class="alert alert-danger" role="alert">New password cannot be the same as old password!</div> -->

        <div class="input_box">
            <input id="email" placeholder="Enter email" type="text">

            <!--- Email Validation -->
            <div class="alert alert-danger" role="alert" style="display: none"><p>This field is required!</p></div>
            <div class="alert alert-danger" role="alert" style="display: none"><p>Please enter a valid email address!</p></div>

            <input id="password" placeholder="Enter password" type="password">

            <!--- Password Validation -->
            <div class="alert alert-danger" role="alert" style="display: none"><p>This field is required!</p></div>
            <div class="alert alert-danger" role="alert" style="display: none"><p>Password must be between 8 - 30 characters!</p></div>
            <div class="alert alert-danger" role="alert" style="display: none"><p>Password must have at least 1 special character (!@#$)</p></div>
            <div class="alert alert-danger" role="alert" style="display: none"><p>Password must have at least 1 uppercase character (A-Z)</p></div>

            <input id="confirm" placeholder="Confirm password" type="password">

            <!-- Confirm password validation -->
            <div class="alert alert-danger" role="alert" style="display: none"><p>This field is required!</p></div>
            <div class="alert alert-danger" role="alert" style="display: none"><p>Password does not match!</p></div>
        </div>
        <div class="check_password">
            <input id="check" type="checkbox">
            See password
        </div>
        <br>
        <button id="sign_in_button">Continue</button>
    </form>

    <!-- Pop up when reset password successfully
    <section id="pop_up_screen">
        <div id="popup">
            <img src="../images/reset password/ok_icon.gif" id="ok_icon" alt="OK icon">
            <h1>Reset password successfully!</h1>
            <a href="index.php?page=sign_in"><button id="sign_in_nav">Go to Sign in</button></a>
        </div>
    </section> -->

    <?php
        require_once "./pages/Components/footer.php";
    ?>
    <script type="module" src="../js/Page/reset_password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
 </html>