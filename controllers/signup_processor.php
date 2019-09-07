<?php
    include_once "controller_preprocessor.php";

    if (check_session()) {
        redirect_to("../includes/logout.php");
    }
    
    // check if the fields are set
    if (!isset($_POST['register_button'])) {
        redirect_to("../includes/logout.php");
    }

    // if any of the fields in not set
    if (!isset($_POST['sign_up_first_name']) || !isset($_POST['sign_up_last_name']) || !isset($_POST['sign_up_email']) || !isset($_POST['sign_up_password']) || !isset($_POST['sign_up_confirm_password']) || !isset($_POST['sign_up_user_bio'])) {
        redirect_to("../signup.php?msg=a field might not be set");
    }

    // check for empty fields
    if (empty($_POST['sign_up_first_name']) || empty($_POST['sign_up_last_name']) || empty($_POST['sign_up_email']) || empty($_POST['sign_up_password']) || empty($_POST['sign_up_confirm_password']) || empty($_POST['sign_up_user_bio'])) {
        redirect_to("../signup.php?msg=a field might be empty");
    }

    // check_data
    $first_name = strtolower(check_data($_POST['sign_up_first_name']));
    $last_name = strtolower(check_data($_POST['sign_up_last_name']));

    // email validation
    $email = check_data($_POST['sign_up_email']);
    $email = strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
        redirect_to("../signup.php?msg=invalid email");
    }

    // validate password
    $password = check_data($_POST['sign_up_password']);
    $confirm_password = check_data($_POST['sign_up_confirm_password']);

    if ($password !== $confirm_password) {
        redirect_to("../signup.php?msg=passwords do not match");
    }

    // encrypt password -- for development purposes -- use sha1
    $password = sha1($password);

    $user_bio = strtolower(check_data($_POST['sign_up_user_bio']));

    // put credentials into an array
    $user_data_list = array($first_name, $last_name, $email, $password, $user_bio);

    // insert data into the database
    if (!insert_into_tb_users($user_data_list)) {
        redirect_to("../signup.php?msg=could not insert into database");
    }

    // set a session on success
    $token = generate_session_token($email);
    set_session($token);

    // verify there session
    if (!check_session()) {
        redirect_to("../includes/logout.php?msg=session error sever or connection may be down");
    }

    // on success, take to the main page
    redirect_to("../index.php?msg=sign up successful");

?>
