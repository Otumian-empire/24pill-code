<?php

/* Start a session */
if (!session_start()) {
    session_start();
}

/* connect to the database using the defined configurations */
require_once "configuration.php";

$db_connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if (!$db_connection) {
    echo("Database connection error<br>" . mysqli_connect_error());
}

?>
