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
        include "./Components/header.php";
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

            <form id="contact-form">
                <label>Email</label>
                <input type="text" placeholder="Enter email">
                <label>Title</label>
                <input type="text" placeholder="Enter the contact title">
                <label>Message</label>
                <textarea type="text" placeholder="Enter the message"></textarea>
                <button id="submit-contact" type="submit">Submit</button>
            </form>
        </div>
    </section>

    <?php
        include "./Components/footer.php";
    ?>
</body>
</html>