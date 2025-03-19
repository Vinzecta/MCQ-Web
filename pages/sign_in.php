<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/sign_in.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <script src="/js/sign_in.js"></script>
    <title>Sign in</title>
</head>
<body>
    <form class="sign_in">
        <p id="introduction">Let's sign you up</p>
        <div class="input_box">
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Password" id="password">
            </div>
        </div>
        <div class="check_password">
            <input type="checkbox" onclick="show_password()">
            See password
        </div>
        <a id="forgot_password" href="index.php?page=forgot_password">Forgot password?</a>
        <button id="sign_in_button">Sign in</button>
        <p id="or">or</p>
        <div class="social_image">
            <img src="/images/sign in/google.png" alt="google" id="google_icon">
            <img src="/images/sign in/facebook.png" alt="facebook" id="facebook_icon">
        </div>
        <p id="register">Don't have account? <a id="register_link" href="index.php?page=sign_up">Register Now</a></p>
    </form>
</body>
</html>