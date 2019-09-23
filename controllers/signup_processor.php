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

        $url  = "";
        $url .= "../signup.php?msg=a field might not be set";
        $url .= "&sign_up_first_name=".urlencode($_POST['sign_up_first_name']);
        $url .= "&sign_up_last_name=".urlencode($_POST['sign_up_last_name']);
        $url .= "&sign_up_email=".urlencode($_POST['sign_up_email']);
        $url .= "&sign_up_user_bio=".urlencode($_POST['sign_up_user_bio']);

        redirect_to($url);
    }

    // check for empty fields
    if (empty($_POST['sign_up_first_name']) || empty($_POST['sign_up_last_name']) || empty($_POST['sign_up_email']) || empty($_POST['sign_up_password']) || empty($_POST['sign_up_confirm_password']) || empty($_POST['sign_up_user_bio'])) {
        $url  = "";
        $url .= "../signup.php?msg=a field might be empty";
        $url .= "&sign_up_first_name=".urlencode($_POST['sign_up_first_name']);
        $url .= "&sign_up_last_name=".urlencode($_POST['sign_up_last_name']);
        $url .= "&sign_up_email=".urlencode($_POST['sign_up_email']);
        $url .= "&sign_up_user_bio=".urlencode($_POST['sign_up_user_bio']);

        redirect_to($url);
    }

    // check_data
    $first_name = strtolower(check_data($_POST['sign_up_first_name']));
    $last_name = strtolower(check_data($_POST['sign_up_last_name']));

    // email validation
    $email = check_data($_POST['sign_up_email']);
    $email = strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $url  = "";
        $url .= "../signup.php?msg=invalid email";
        $url .= "&sign_up_first_name=".urlencode($_POST['sign_up_first_name']);
        $url .= "&sign_up_last_name=".urlencode($_POST['sign_up_last_name']);
        $url .= "&sign_up_email=".urlencode($_POST['sign_up_email']);
        $url .= "&sign_up_user_bio=".urlencode($_POST['sign_up_user_bio']);

        redirect_to($url);
    }

    // checking to see if email already exist - no duplicates
    // else redirect to the login page with the user email
    $user_emails = select_user_emails();

    $user_emails = array_column($user_emails, 0);

    if (in_array($email, $user_emails)) {
        $url  = "";
        $url .= "../login.php?msg=email already, enter password to login";
        $url .= "&login_email=".urlencode($email);

        redirect_to($url);
    }

    // validate password
    $password = $_POST['sign_up_password'];
    $confirm_password = $_POST['sign_up_confirm_password'];

    if ($password !== $confirm_password) {
        redirect_to("../signup.php?msg=passwords do not match");
    }

    if (!validate_password($password)) {
        $url  = "";
        $url .= "../signup.php?msg=invalid password entered ";
        $url .= "- password must be at least eight charaters long ";
        $url .= ", must have at least an uppercase, a lowercase, a number ";
        $url .= "and a special character";

        redirect_to($url);
    }

    // hashing password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $user_bio = strtolower(check_data($_POST['sign_up_user_bio']));

    // put credentials into an array
    $user_data_list = array($first_name, $last_name, $email, $hashed_password, $user_bio);

    // insert data into the database
    if (!insert_into_tb_users($user_data_list)) {
        redirect_to("../signup.php?msg=could not insert into database " . mysqli_error($db_connection));
    }

    // set a session on success
    $token = generate_session_token($email);
    set_session($token);

    // verify there session
    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    // on success, take to the main page
    redirect_to("../index.php?msg=sign up successful");
