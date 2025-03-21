<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/forgot_password.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <title>Password reset</title>
</head>
<body>
    <form id="password_reset">
        <p id="title">Reset Password</p>
        <p id="instruction">Enter your email for a password for a reset link!</p>
        <input type="text" placeholder="Email" id="email_input">
        <button type="submit" id="reset_button">Send reset link</button>
        <a href="index.php?page=sign_in" id="back">Back to sign in</a>
    </form>
</body>
</html>