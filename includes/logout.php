<?php
    // logout user and redirect to the login page
    session_start();
    require_once "functions.php";

    // destroy everything that may give user a connection/link/reference to the system
    if (isset($_SESSION['token'])) {
        // unset($_SESSION['token']);
        $_SESSION['token'] = '';
    }
    
    // session_unset();
    $_SESSION = array();
    session_destroy();

    // redirecting to login
    redirect_to("../login.php?msg=you have been logged out successfully");
