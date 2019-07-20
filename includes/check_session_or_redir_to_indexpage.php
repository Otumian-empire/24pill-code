<?php
    if($connection && isset($_SESSION['index_number'])) {
        $index_number = $_SESSION['index_number'];
    } else {
        redirect_to("indexpage.php");
    }
?>
