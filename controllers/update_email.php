<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php?msg=a sign up or login is required");
    }

    if (!isset($_POST['update_email_btn'])) {
        redirect_to("../signup.php?msg=create a an account");
    }

    // generate token
    $token = generate_token();

    // get token_dormancy period
    $token_dormancy = get_dormancy_time();

    // get user_email
    $user_email = get_user_email();

    // get token_purpose -- other option is PASSD
    $token_purpose = strtoupper("EMAIL");

    $insert_token_query = "INSERT INTO `tokens`(`token_text`, `token_dormancy`, `token_purpose`, `user_email`) VALUES ('$token', '$token_dormancy', '$token_purpose', '$user_email')";
    
    $insert_token_result = mysqli_query($db_connection, $insert_token_query);

    if (!$insert_token_result) {
        redirect_to("../user_profile.php?msg=couldn't insert token in the tokens table "
        . mysqli_error($db_connection));
    }

    // TODO: send the token to the user by the email

    // redirect_to token_field.php to verify the token
    redirect_to('../email_token_field.php?msg=enter token and new email');
