<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Outfit' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/Page/contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ligma - Contact</title>
</head>
<body>
    <?php
        include "./Components/header.php";
    ?>

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