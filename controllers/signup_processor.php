<?php
    // require the database connection
    require_once "../includes/connection.php";

    // include the function file
    include_once "../includes/functions.php";

    // get the connection instance
    $db_connection = $GLOBALS['db_connection'];

    // check if there isn't a connection
    if (!$db_connection) {
        header("Location: ../views/signup.php");
        exit;
    }

    // check if the fields are set
    if (isset($_POST['register_button'])) {

        // if any of the fields in not set
        if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirm_password']) || !isset($_POST['lastuser_bio_name'])) {
            redirect_to("../views/signup.php");
        }

        $first_name = check_data($_POST['first_name']);
        $last_name = check_data($_POST['last_name']);

        // email validation
        $email = check_data($_POST['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            // $link = "?first_name=".$first_name . "&last_name=" . $last_name . "&email=" . $email . "user_bio=" . $bio;            
            redirect_to("../views/signup.php");
        }

        // validate password
        $password = check_data($_POST['password']);
        $confirm_password = check_data($_POST['confirm_password']);

        if ($password !== $confirm_password) {
            redirect_to("../views/signup.php");
        }

        // encrypt password -- for development purposes -- use md5
        $password = sha1($password);
        $user_bio = check_data($_POST['user_bio']);

        // check if any of them are empty
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($user_bio)) {
            redirect_to("../views/signup.php");
        }

        // put credentials into an array
        $user_data = array($first_name, $last_name, $email, $password, $user_bio);

        // insert data into the database
        if (insert_into_users_tb($user_data)) {

            // set a session on success
            $token = generate_session_token($email);
            set_session($token);

            // verify there session
            if (check_session()) {
                // on success, take to the main page
            redirect_to("../");
            } else {
                redirect_to("../includes/logout.php");
            }

        } else {
            redirect_to("../views/signup.php");
        }

    } else {
        redirect_to("../views/signup.php");
    }

?>
