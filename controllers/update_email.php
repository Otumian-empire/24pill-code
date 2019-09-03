<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../signup.php?msg=create a an account");
    }


    if (isset($_POST['update_email_btn'])) {
        redirect_to("../user_profile.php?msg=There is a need for a configuration not implemented yet");
    }