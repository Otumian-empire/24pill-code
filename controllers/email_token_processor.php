<?php
    include_once "controller_preprocessor.php";

    define('TOKENSIZE', 6);
    define('PURPOSE_EMAIL', 'EMAIL');
    define('PURPOSE_PASSWORD', 'PASSD');

    if (!check_session()) {
        redirect_to('../includes/logout.php');
    }

    if (isset($_POST['email_token_btn'])) {
        
        // validating the new email
        if (!isset($_POST['update_email']) || empty($_POST['update_email'])) {
            redirect_to("../user_profile.php?msg=new email field empty or not set in the token processor");
        }

        $update_email = check_data($_POST['update_email']);
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

        $select_token_row_query = "SELECT `token_text`, `token_dormancy`, `token_purpose` FROM `tokens` WHERE `tokens`.`user_email` = '$user_email' ORDER BY `tokens`.`token_date` DESC LIMIT 1";

        $select_token_row_result = mysqli_query($db_connection, $select_token_row_query);

        if (!$select_token_row_result) {
            redirect_to("../user_profile.php?msg=couldn't select token row, edit any of the fields below and try again");
        }

        $selected_token_row_data = mysqli_fetch_assoc($select_token_row_result);

        $token_text     = $selected_token_row_data['token_text'];      // checked
        $token_dormancy = $selected_token_row_data['token_dormancy'];  // checked
        $token_purpose  = $selected_token_row_data['token_purpose'];   // checked

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

            $update_token_sql = "UPDATE `tokens` SET `token_text`='$token', `token_dormancy`= '$token_dormancy',`token_purpose`= PURPOSE_EMAIL WHERE `user_email`= '$user_email'";

            $update_token_result = mysqli_query($db_connection, $update_token_sql);

            if (!$update_token_result) {
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

        // check if the user-entered-token is the same as in the database
        if ($token !== $token_text) {
            redirect_to("../token_field.php?msg=invalide token entered");
        }

        if ($token_purpose === PURPOSE_EMAIL) {
            // update the user email with the update email
            // get user_email
            $user_email = get_user_email();

            $update_user_email_result = update_tb_users('user_email', $update_email, 'user_email', $user_email);

            if (!$update_user_email_result) {
                redirect_to("../user_profile.php?msg=couldn't update user email, try again later " . mysqli_error($db_connection));
            }

            // you have to update anywhere the former email was used
            // in articles, in comments, and drop all the tokens in the name of the former email
            $update_email_in_articles = update_tb_articles('user_email', $update_email, 'user_email', $user_email);

            if (!$update_email_in_articles) {
                redirect_to("../user_profile.php?msg=couldn't update user email in artilces" . mysqli_error($db_connection));
            }

            $update_email_in_comments = update_tb_comments('user_email', $update_email, 'user_email', $user_email);

            if (!$update_email_in_comments) {
                redirect_to("../user_profile.php?msg=couldn't update user email in comments" . mysqli_error($db_connection));
            }

            redirect_to("../includes/logout.php?msg=email updated, login to continue");

        } 

        // when the token purpose fails
        redirect_to("../user_profile.php?msg=couldn't update user email, Reset token and please try again later");
        
    } else {
        redirect_to("../includes/logout.php?msg=a sign up or login is required");
    }
