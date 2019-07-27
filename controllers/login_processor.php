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
    if (isset($_POST['login_button'])) {
    
        // email validation
        $email = check_data($_POST['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            redirect_to("../views/login.php");
        }

        // password validation
        $password = check_data($_POST['password']);

        // encrypt password -- for development purposes -- use sha1
        $password = sha1($password);
        
        // check if any of the credentials is empty
        if (empty($email) || empty($password)) {
            redirect_to("../views/login.php");
        }

        // put credentials into an array
        $user_data = array($email, $password);

        // insert data into the database
        // instead of inserting we select from the database
        if (select_from_tb($user_data)) {

            // set a session on success
            $token = generate_session_token($email);
            set_session($token);

            // verify there session
            if (!check_session()) {
                redirect_to("../includes/logout.php");
            } else {
                // on success, take to the main page
                redirect_to("../");
            }
            
        } else {
            redirect_to("../views/login.php");
        }

    } else {
        redirect_to("../views/login.php");
    }

?>
