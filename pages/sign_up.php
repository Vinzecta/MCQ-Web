<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Page/sign_up.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign up</title>
</head>
<body>
    <form class="sign_in">
        <p id="introduction">Let's sign you in</p>
        <div class="input_box">
            <input type="text" placeholder="Username" id="username">
            <input type="text" placeholder="Email" id="email">
            <input type="password" placeholder="Password" id="password">
            <input type="password" placeholder="Confirm password" id="confirm">
        </div>
        <div class="check_password">
            <input type="checkbox">
            See password
        </div>
        <a href="index.php?page=landing_page"><button id="sign_in_button">Sign up</button></a>
        <p id="or">or</p>
        <div class="social_image">
            <img src="../images/sign in/google.png" alt="google" id="google_icon">
            <img src="../images/sign in/facebook.png" alt="facebook" id="facebook_icon">
        </div>
        <p id="register">Have account? <a id="register_link" href="index.php?page=sign_in">Login Now</a></p>
    </form>
    <script src="../js/sign_up.js"></script>
    <script src="../js/sign_in.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>