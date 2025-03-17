<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/landing_page.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Sign in</title>
</head>
<body>
    <form class="sign_in">
        <p id="introduction">Let's sign you in</p>
        <p id="welcome">Welcome Back, you have been missed</p>
        <div class="input_box">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Password">
        </div>
        <a id="forgot_password" href="index.php?page=forgot">Forgot password?</a>
        <button id="sign_in_button">Sign in</button>
        <p id="or">or</p>
        <div class="social_image">
            <img src="/images/sign in/google.png" alt="google" id="google_icon">
            <img src="/images/sign in/facebook.png" alt="facebook" id="facebook_icon">
        </div>
        <p id="register">Don't have account? <a href="index.php?page=register">Register Now</a></p>
    </form>
</body>
</html>