<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sort_by = (isset($_POST["sort_by"])) ? $_POST["sort_by"] : '_';
        $sort_order = (isset($_POST["sort_order"])) ? $_POST["sort_order"] : '_';
        $sort_category = (isset($_POST["sort_category"])) ? $_POST["sort_category"] : '_';


        $_SESSION["sort_by"] = $sort_by;
        $_SESSION["sort_order"] = $sort_order;
        $_SESSION["sort_category"] = $sort_category;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    