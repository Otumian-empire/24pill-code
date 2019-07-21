<?php
    // logout user and redirect to the log in page
    require_once "functions.php";
    require_once "autologout.php";
    
    redirect_to("../views/login.php");

?>