<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    if (!isset($_POST['update_password_btn'])) {
        redirect_to("../user_profile.php?msg=create a an account");
    }

    // generate token
    $token = generate_token();

    // get token_dormancy period
    $token_dormancy = get_dormancy_time();

    // get user_email and full name
    $user_email = get_user_email();
    $user_name = get_user_name($user_email);

    // get token_purpose -- other option is EMAIL
    $token_purpose = strtoupper("PASSD");

    $insert_token_query = "INSERT INTO `tokens`(`token_text`, `token_dormancy`, `token_purpose`, `user_email`) VALUES ('$token', '$token_dormancy', '$token_purpose', '$user_email')";
    
    $insert_token_result = mysqli_query($db_connection, $insert_token_query);

    if (!$insert_token_result) {
        redirect_to("../user_profile.php?msg=couldn't insert token in the tokens table "
        . mysqli_error($db_connection));
    }
        
    // TODO: send the token to the user by the email
    $subject = "PASSWORD TOKEN";
    $content = "PASSWORD TOKEN - <i>" . $token . "</i><br>";
    $content .= "This is an attempt to chnage your password, and if it isn't you, try to secure your account by providing a security info or report this message instantly";

    if (send_email($user_email, $user_name, $subject, $content)) {
        // redirect_to token_field.php to verify the token
        // redirect_to('../password_token_field.php?msg=enter token and new password');
        echo '<script type="text/javascript">
				location.replace("../password_token_field.php?msg=enter token and new password");
              </script>';
              exit;
    } else {
        redirect_to('../user_profile.php');
    }
