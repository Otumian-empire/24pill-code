<?php
    include_once "controller_preprocessor.php";

    define('TOKENSIZE', 6);

    if (!check_session()) {
        redirect_to("../user_profile.php?msg=edit any of the fields below");
    }

    if (isset($_POST['token_btn'])) {

        if (!isset($_POST['token']) || empty($_POST['token'])) {
            redirect_to("../token_field.php?msg=token field is empty");
        }

        $token = check_data($_POST['token']);

        $token_size = strlen($token);

        if ($token_size !== TOKENSIZE) {
            redirect_to("../token_field.php?msg=invalid token - size, check the token and re-enter it again");
        }

        foreach ($token as $char) {

            if (!is_int($char)) {
                redirect_to("../token_field.php?msg=invalid token - char_type, check the token and re-enter it again");
            }

        }

        // check if the user entered token is the same as in the database
        // get the update_email from $GLOBALS['update_email']
        // then update the email
        // log user out
        // and redirect to login
        
    } else {
        redirect_to("../user_profile.php?msg=edit any of the fields below");
    }
