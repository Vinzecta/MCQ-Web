<!-- Send email for reset password -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/Page/forgot_password.css">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>