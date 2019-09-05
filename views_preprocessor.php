<?php
    // require the connection
    require_once "includes/connection.php";

    // check if there is connection
    $db_connection = $GLOBALS['db_connection'];

    // TODO: since there is no database connection, it means the page can not be viewed as such
    // return internal server error
    if (!$db_connection) {
        redirect_to("/?msg=". mysqli_connect_error() . " server or connection error");
    }

    // require the functions
    require_once "includes/functions.php";

    // include header
    include_once "templates/header.php";

    // include navigation bar
    include_once "templates/navigation_bar.php";

?>
