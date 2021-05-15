<?php
    # Starting session
    session_start();
    # if user is logged in
    if(isset($_SESSION["user_info"]) && !empty($_SESSION["user_info"])){
        # destroy all sessioin
        session_destroy();
    }
    /* Redirect browser */
    header("Location: http://localhost/bluestone/login.php"); 
    exit();
?>