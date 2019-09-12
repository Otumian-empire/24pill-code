<?php
    include_once "views_preprocessor.php";

    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
