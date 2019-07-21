<?php

    $db_connection = $GLOBALS['db_connection'];
    if ($db_connection) {
        mysqli_close($db_connection);
    }

    session_unset();
    session_destroy();

?>
