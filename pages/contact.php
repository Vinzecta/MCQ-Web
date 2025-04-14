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
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/contact.css">
    <title>Ligma - Contact</title>
</head>
<body>
    <?php
        require_once "./Components/header.php";
        $base_url = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname(dirname($_SERVER['PHP_SELF'])), '/\\');
        if(isset($_SESSION['Student_status']) && $_SESSION['Student_status'] == 'banned') {
            header("Location: $base_url/pages/index.php?page=you_have_been_banned");
            exit;
        }
    ?>

    <h1 id="contact-us">Contact Us</h1>

    <section id="contact">
        <div id="contact-left">
            <h2 id="contact-title">Contact Information</h2>

            <div id="contact-info">
                <div id="office">
                    <p id="address">abc Ho Chi Minh City</p>
                    <p id="phone-number">0123456789</p>
                    <p id="gmail">vinhtran23042004@gmail.com</p>
                </div>
            </div>
        </div>

        <div id="contact-right">
            <h2>Got Any Question?</h2>
            <p>Use the form below to contact with us!</p>

            <form id="contact-form" method="POST" action="../logical/contact_process.php">
                <label>Email</label>
                <?php
                    if (isset($_SESSION['User_ID'])) {
                        echo '<input type="text" placeholder="Enter email" value="' . $_SESSION['Email'] . '" name="email" readonly>';
                    }
                    else {
                        echo '<input type="text" placeholder="Enter email" name="email">';
                    }
                ?>
                <label>Title</label>
                <input type="text" placeholder="Enter the contact title" name="title">
                <label>Message</label>
                <textarea type="text" placeholder="Enter the message" name="message"></textarea>
                <button id="submit-contact" type="submit">Submit</button>
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
            </form>
            
        </div>
    </section>

    <?php
        require_once "./Components/footer.php";
    ?>
</body>
</html>