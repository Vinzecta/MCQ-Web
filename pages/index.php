<?php
    $page = 'landing_page';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    else if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }
    require_once "./$page.php";
?>