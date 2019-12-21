<?php
    include_once "controller_preprocessor.php";

    // check if user has logged in
    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    // check if the button was pressed as we only accept POST methhod
    if (!isset($_POST['update_email_btn'])) {
        redirect_to("../user_profile.php?msg=click the btn");
    }

    // generate token
    $token = generate_token();

    // get token_dormancy period
    $token_dormancy = get_dormancy_time();

    // get user_email
    $user_email = get_user_email();

    // get token_purpose -- other option is PASSD for password update
    $token_purpose = strtoupper("EMAIL");

    // insert the generated credentials into the database
    $insert_token_query = "INSERT INTO `tokens`(`token_text`, `token_dormancy`, `token_purpose`, `user_email`) VALUES ('$token', '$token_dormancy', '$token_purpose', '$user_email')";
    
    $insert_token_result = mysqli_query($db_connection, $insert_token_query);

    if (!$insert_token_result) {
        redirect_to("../user_profile.php?msg=couldn't insert token in the tokens table "
        . mysqli_error($db_connection));
    }

    // TODO: send the token to the user by the email
    if (send_email($user_email, $user_email, $token_purpose, "update email with this token: ".$token)) {
        // redirect_to token_field.php to verify the token
        redirect_to('../email_token_field.php?msg=enter token and new email');
    } else {
        redirect_to('../user_profile.php');
    }
?>