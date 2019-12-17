<?php
    // this is a preprocessor file
    // run this file before any line
    include_once "controller_preprocessor.php";

    if (check_session()) {
        redirect_to("../includes/logout.php");
    }

    // check if the fields are set
    if (!isset($_POST['login_button'])) {
        redirect_to("../includes/logout.php");
    }

    // check if any of the fields in not set
    if (!isset($_POST['login_email']) || !isset($_POST['login_password'])) {
        redirect_to("../login.php?msg=a field might not be set&login_email=".urlencode($_POST['login_email']));
    }

    // check if fields are actually empty
    if (empty($_POST['login_email']) || empty($_POST['login_password'])) {
        redirect_to("../login.php?msg=a field may be empty&login_email=".urlencode($_POST['login_email']));
    }

    // email validation
    $email = check_data($_POST['login_email']);
    $email = strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirect_to("../login.php?msg=email is invalid&sign_up_email=".urlencode($email));
    }

    // checking to see if email already exist - no duplicates
    // else redirect to the login page with the user email
    $user_emails = select_user_emails();

    $user_emails = array_column($user_emails, 0);
    
    if (!in_array($email, $user_emails)) {
        redirect_to("../signup.php?msg=email doesn't exist, register&sign_up_email=".urlencode($email));
    }

    // read the hashed password from the database
    // and password_verify it against the password text from the user
    // this is an array with index 0
    $hashed_password = select_from_tb_users('user_password', 'user_email', $email)[0];
    
    $password = $_POST['login_password'];

    // get and validate the password
    if (!validate_password($password)) {
        $url  = "";
        $url .= "../login.php?msg=invalid password entered ";
        $url .= "- password must be at least eight charaters long ";
        $url .= ", must have at least an uppercase, a lowercase, a number ";
        $url .= "and a special character";
        $url .= "&login_email=";
        $url .= $email;

        redirect_to($url);
    }

    if (!password_verify($password, $hashed_password)) {
        redirect_to("../login.php?msg=incorrect email or password, check and enter again&login_email=".urlencode($email));
    }

    // set a session on success
    $token = generate_session_token($email);
    set_session($token);

    // verify there session
    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    // on success, take to the main page
    redirect_to("../index.php?msg=logged in successfully");
