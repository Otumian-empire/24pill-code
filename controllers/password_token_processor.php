<?php
    include_once "controller_preprocessor.php";

    define('TOKENSIZE', 6);
    define('PURPOSE_EMAIL', 'EMAIL');
    define('PURPOSE_PASSWORD', 'PASSD');

    if (!check_session()) {
        redirect_to('../includes/logout.php?msg=you must loggin or sign up to change your user info');
    }

    if (!isset($_POST['password_token_btn'])) {
        redirect_to("../user_profile.php?msg=click the button");
    }
    
    // validating the token
    if (!isset($_POST['token']) || empty($_POST['token'])) {
        redirect_to("../token_field.php?msg=token not set or field is empty");
    }

    $token = check_data($_POST['token']);

    $token_size = strlen($token);

    if ($token_size !== TOKENSIZE) {
        redirect_to("../token_field.php?msg=invalid token - size, check the token "
        ."and re-enter it again" . mysqli_error($db_connection)) . "&token=" . $token;
    }

    // validating the new password
    if (!isset($_POST['update_password']) || empty($_POST['update_password'])) {
        redirect_to("../token_field.php?msg=new email field empty or not set in the token processor&token=" . $token);
    }

    // validating new password
    $update_password = check_data($_POST['update_password']);

    // $update_password = sha1($update_password);
    // redirect to the password_token_field.php
    if (!validate_password($update_password)) {
        $url  = "";
        $url .= "../password_token_field.php?msg=invalid password entered ";
        $url .= "- password must be at least eight charaters long ";
        $url .= ", must have at least an uppercase, a lowercase, a number ";
        $url .= "and a special character";
        $url .= "&token=".urlencode($token);

        redirect_to($url);
    }

    // hashing password
    $hashed_password = password_hash($update_password, PASSWORD_BCRYPT);

    $user_email = get_user_email();

    // query the database with the email to select the row with the same email
    $select_token_row_query = "SELECT `token_text`, `token_dormancy`, `token_purpose` FROM `tokens` WHERE `tokens`.`user_email` = '$user_email' ORDER BY `tokens`.`token_date` DESC LIMIT 1";

    $select_token_row_result = mysqli_query($db_connection, $select_token_row_query);

    if (!$select_token_row_result) {
        redirect_to("../user_profile.php?msg=couldn't select token row, edit any of the fields below and try again");
    }

    $selected_token_row_data = mysqli_fetch_assoc($select_token_row_result);

    $token_text     = $selected_token_row_data['token_text'];      // checked
    $token_dormancy = $selected_token_row_data['token_dormancy'];  // checked
    $token_purpose  = $selected_token_row_data['token_purpose'];   // checked

    // check if the current time stamp has exceeded the dormancy time using has_token_expired($token_dormancy)
    if (has_token_expired($token_dormancy)) {

        // reset the token and redirect_to token page with the update email

        // get user_email and user full name
        $user_email = get_user_email();
        $user_name = get_user_name($user_email);

        // delete the current token
        $delete_token_result = delete_from_tb_token('user_email', $user_email);

        if (!$delete_token_result) {
            redirect_to("../user_profile.php?msg=couldn't delete token row" . mysqli_error($db_connection));
        }
        
        // generate token
        $token = generate_token();

        // get token_dormancy period
        $token_dormancy = get_dormancy_time();

        // get token_purpose -- other option is PASSD
        $token_purpose = PURPOSE_PASSWORD;

        $update_token_query = "UPDATE `tokens` SET `token_text` = '$token', `token_dormancy` = '$token_dormancy', `token_purpose` = '$token_purpose' WHERE `user_email` = '$user_email'";

        $update_token_result = mysqli_query($db_connection, $update_token_query);

        if (!$update_token_result) {
            redirect_to("../user_profile.php?msg=couldn't update token in the tokens table " .  mysqli_error($db_connection));
        }

        // TODO: send the token to the user by the email
        $subject = "PASSWORD TOKEN";
        $content = "PASSWORD TOKEN - <i>" . $token . "</i><br>";
        $content .= "This is an attempt to chnage your password, and if it isn't you, try to secure your account by providing a security info";

        if (send_email($user_email, $user_name, $subject, $content)) {
            // redirect_to token_field.php to verify the token
            redirect_to('../token_field.php?msg=token has expired, enter new token and new email');
        } else {
            redirect_to('../user_profile.php?msg=couldn\'t send email after token has expired');
        }
    }

    // check the sizes
    if (strlen($token) !== TOKENSIZE || strlen($token_text) !== TOKENSIZE) {
        redirect_to("../token_field.php?msg=invalid entered, invalid token sizes..");
    }

    // check if the user-entered-token is the same as in the database
    if ($token !== $token_text) {
        redirect_to("../token_field.php?msg=invalide token entered");
    }

    if ($token_purpose !== PURPOSE_PASSWORD) {
        redirect_to("../user_profile.php?msg=couldn't update user password, Reset token and please try again later");
    }

    // update the user email with the update email and delete the token
    // get user_email
    $user_email = get_user_email();
    $user_name = get_user_name($user_email);

    // now update the password with the email
    $update_user_password_result = update_tb_users('user_password', $hashed_password, 'user_email', $user_email);

    if (!$update_user_password_result) {
        redirect_to("../user_profile.php?msg=couldn't update user password, try again later " . mysqli_error($db_connection));
    }
    
    $delete_token_result = delete_from_tb_token('user_email', $user_email);

    if (!$delete_token_result) {
        redirect_to("../user_profile.php?msg=couldn't delete token row" . mysqli_error($db_connection));
    }

    // send email to user that there has been a password change
    $subject = "SECURITY ALERT - PASSWORD CHANGE";
    $content = "This is a security alert from 24pillcode, your password has been changed.<br>";
    $content .= "Report if, explicitly if your aren't the one. You can also seccure your account by providing a security info.";

    if (send_email($user_email, $user_name, $subject, $content)) {
        redirect_to("../includes/logout.php?msg=password updated, login to continue");
        // echo '<script type="text/javascript">
		// 		location.replace("../includes/logout.php?msg=password updated, login to continue");
        //       </script>';
        // exit;
    } else {
        redirect_to("../user_profile.php");
    }
