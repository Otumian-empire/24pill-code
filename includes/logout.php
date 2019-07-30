<?php
    // logout user and redirect to the login page
    session_start();
    require_once "functions.php";

    // destroy everything that may give user a connection/link/reference to the system
    if (isset($_SESSION['token'])) {
        unset($_SESSION['token']);
    }
    
    session_unset();
    session_destroy();

    // redirecting to login
    redirect_to("/?success_msg=you+have+been+logged+out+successfully");

?>
