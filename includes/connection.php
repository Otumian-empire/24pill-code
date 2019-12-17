<?php
    // Start a session
    if (!session_start()) {
        session_start();
    }

    // connect to the database using the defined configurations
    require_once "db_configuration.php";

    $db_connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    if (!$db_connection) {
        echo("Database connection error<br>" . urlencode(mysqli_connect_error()));
        // redirection here to 505..
        // exit;
    }

    $GLOBALS['db_connection'] = $db_connection;
