<?php
    include_once "controller_preprocessor.php";

    define('TOKENSIZE', 6);
    define('PURPOSE_EMAIL', 'EMAIL');
    define('PURPOSE_PASSWORD', 'PASSD');

    if (!check_session()) {
        // redirect_to("../user_profile.php?msg=edit any of the fields below");
        redirect_to('../login.php?msg=you must loggin or sign up to change your user info');
    }

    if (isset($_POST['token_btn'])) {
        

        // validating the new email
        if (!isset($_POST['update_email']) || empty($_POST['update_email'])) {
            redirect_to("../user_profile.php?msg=new email field empty or not set in the token processor");
        }

        $update_email = urldecode($_POST['update_email']);
        $update_email = check_data($update_email);
        $update_email = strtolower(filter_var($update_email, FILTER_SANITIZE_EMAIL));
        
        if (!filter_var($update_email, FILTER_VALIDATE_EMAIL)) {   
            redirect_to("../user_profile.php?msg=Invalid new email, enter a valid email");
        }

        // validating the token
        if (!isset($_POST['token']) || empty($_POST['token'])) {
            redirect_to("../token_field.php?msg=token not set or field is empty");
        }

        $token = check_data($_POST['token']);

        $token_size = strlen($token);

        if ($token_size !== TOKENSIZE) {
            redirect_to("../token_field.php?msg=invalid token - size, check the token "
            ."and re-enter it again" . mysqli_error($db_connection));
        }

        $user_email = get_user_email();

        $sql_select_token_row = "SELECT `token_text`, `token_state`, `token_dormancy`, `token_purpose` FROM `tokens` WHERE `tokens`.`user_email` = '$user_email' ORDER BY `tokens`.`token_date` DESC LIMIT 1";

        $token_row_result = mysqli_query($db_connection, $sql_select_token_row);

        if (!$token_row_result) {
            redirect_to("../user_profile.php?msg=couldn't select token row, edit any of the fields below and try again");
        }

        $token_row_data = mysqli_fetch_assoc($token_row_result);
        // print_r($token_row_data);
        // exit;

        $token_state    = $token_row_data['token_state'];     // checked
        $token_text     = $token_row_data['token_text'];      // checked
        $token_dormancy = $token_row_data['token_dormancy'];  // checked
        $token_purpose  = $token_row_data['token_purpose'];   // checked

        // check the toke_state
        if ($token_state) {
            // reset the token and redirect_to the token field with the update email

            // generate token
            $token = generate_token();

            // get token_dormancy period
            $token_dormancy = get_dormancy_time();

            // get user_email
            $user_email = get_user_email();

            // get token_purpose -- other option is PASSD
            $token_purpose = strtoupper("EMAIL");

            $sql_reset_token = "UPDATE `tokens` SET `token_text`='$token', `token_state`= 0,`token_dormancy`= '$token_dormancy',`token_purpose`= PURPOSE_EMAIL WHERE `user_email`= '$user_email'";

            $update_token_sql = mysqli_query($db_connection, $sql_reset_token);

            if (!$update_token_sql) {
                redirect_to("../user_profile.php?msg=couldn't update token in the tokens table "
                . mysqli_error($db_connection));
            }

            // TODO: send the token to the user by the email

            // redirect_to token_field.php to verify the token
            redirect_to('../token_field.php?msg=token has been used, enter new token and new email');

        }

        // check if the current time stamp has exceeded the dormancy time
        // through has_token_expired($token_dormancy)
        if (has_token_expired($token_dormancy)) {
            // reset the token and redirect_to token page with the update email
            // generate token
            $token = generate_token();

            // get token_dormancy period
            $token_dormancy = get_dormancy_time();

            // get user_email
            $user_email = get_user_email();

            // get token_purpose -- other option is PASSD
            $token_purpose = strtoupper("EMAIL");

            $sql_reset_token = "UPDATE `tokens` SET `token_text`='$token', `token_state`= 0,`token_dormancy`= '$token_dormancy',`token_purpose`= PURPOSE_EMAIL WHERE `user_email`= '$user_email'";

            $update_token_sql = mysqli_query($db_connection, $sql_reset_token);

            if (!$update_token_sql) {
                redirect_to("../user_profile.php?msg=couldn't update token in the tokens table "
                . mysqli_error($db_connection));
            }

            // TODO: send the token to the user by the email

            // redirect_to token_field.php to verify the token
            redirect_to('../token_field.php?msg=token has expired, enter new token and new email');
            
        }

        // check the sizes
        if (strlen($token) !== TOKENSIZE || strlen($token_text) !== TOKENSIZE) {
            redirect_to("../token_field.php?msg=invalid entered, invalid token sizes..");
            exit;
        }

        // check if the user entered token is the same as in the database
        if ($token !== $token_text) {
            // reset the token and redirect_to token page with the update email
            redirect_to("../token_field.php?msg=invalide token entered");
        }

        if ($token_purpose === PURPOSE_EMAIL) {
            // update the user email with the update email
            // get user_email
            $user_email = get_user_email();

            $sql_update_user_email = "UPDATE `users` SET `user_email`= '$update_email' WHERE `user_email`= '$user_email'";

            $query_result = mysqli_query($db_connection, $sql_update_user_email);

            if (!$query_result) {
                redirect_to("../user_profile.php?msg=couldn't update user email, try again later " . mysqli_error($db_connection));
            }
            
            redirect_to("../includes/logout.php?msg=email updated, login to continue");

        } 

        redirect_to("../user_profile.php?msg=couldn't update user email, Reset token and please try again later");
        
        
    } else {
        redirect_to("../user_profile.php?msg=edit any of the fields below, this is your user profile");
    }