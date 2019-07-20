<?php
    // this is a simple measure i am putting in place so that if the user tries to go back
    // the user gets logged out automatically
    if(isset($_SESSION['index_number'])) {

        $index_number = $_SESSION['index_number'];
        $date = date('Y-m-d H:i:s');

        update_db('student', 'time_logout', $date, $index_number);
        update_db('student', 'active_status', 0, $index_number);

        session_destroy();

        if ($connection) {
            mysqli_close($connection);
        }
    }
?>
