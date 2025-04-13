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
    <link rel="stylesheet" href="../styles/Component/header.css">
</head>
<body>
    <header id="header">
        <a id="logo-nav" href="index.php?page=landing_page"><h1 id="logo">Ligma</h1></a>
        <nav id="navigation">
            <a href="index.php?page=landing_page">HOME</a>
            <a href="index.php?page=explore">EXPLORE</a>
            <a href="index.php?page=contact">CONTACT</a>
            <?php 
            if (isset($_SESSION['User_ID']) && $_SESSION['is_admin'] == TRUE) {
                echo '<nav id="navigation">';
                    echo '<a href="index.php?page=test_management">YOUR TESTS</a>';
                    echo '<a href="index.php?page=question_management">YOUR QUESTIONS</a>';
                    echo '<a href="index.php?page=user_management">STUDENTS</a>';
                echo '</nav>';
                }
            ?>
        </nav>
        <?php 
        if (isset($_SESSION['User_ID'])) {
            echo '<a href="index.php?page=account" id="user"><img src="' . $_SESSION["PFP_URL"] . '"></a>';
            // echo '<img id="user" src="../images/header/user.png" alt="user">';
        }
        else {
            echo '<a id="nav-sign-in" href="index.php?page=sign_in">Log in</a>';
        }
        ?>

        
    </header>
</body>
</html>