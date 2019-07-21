<?php
    // destroy everything that may give user a connection/link/reference to the system

    if (isset($_SESSION['token'])) {
        unset($_SESSION['token']);
        session_unset();
        session_destroy();


        if ($db_connection) {
            mysqli_close($db_connection);
        }
    }

?>
