<!-- Reset password site -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/reset_password.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Reset password</title>
 </head>
 <body>
    <script type="module" src="../js/Page/reset_password.js"></script>
    <form id="reset_password">
        <p id="title">Create New Password</p>
        <p id="instruction">Enter your new password if forgot it!</p>

        <!--Error message for backend (if neccessary)-->
        <div class="alert alert-danger" role="alert">New password cannot be the same as old password!</div>

        <div id="form_input">
            <input id="email" placeholder="Enter email" type="text">
            <input id="password" placeholder="Enter password" type="password">
            <div class="error_message">
                <div class="alert password_require alert-danger" role="alert">New password must be between 8-30 characters</div>
                <div class="alert password_require alert-danger" role="alert">New password must contain at least one uppercase character (A-Z)</div>
                <div class="alert password_require alert-danger" role="alert">New password must contain at least one special character (!@#$)</div>
            </div>

            <input id="confirm_password" placeholder="Confirm password" type="password">
            <div class="error_message">
                <div class="alert password_confirm alert-danger" role="alert">This field is required!</div>
                <div class="alert password_confirm alert-danger" role="alert">Password do not match!</div>
            </div>
        </div>
        <input type="checkbox" id="show_password">Show password
        <br>
        <button id="continue_button">Continue</button>
    </form>

    <!--Pop up when reset password successfully-->
    <section id="pop_up_screen">
        <div id="popup">
            <img src="../images/reset password/ok_icon.gif" id="ok_icon" alt="OK icon">
            <h1>Reset password successfully!</h1>
            <a href="index.php?page=sign_in"><button id="sign_in_nav">Go to Sign in</button></a>
        </div>
    </section>
 </body>
 </html>