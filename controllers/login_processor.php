<?php
    // this is a preprocessor file
    // run this file before any line
    include_once "controller_preprocessor.php";

?>


<?php
    // check if the fields are set
    if (isset($_POST['login_button'])) {
        
        // if any of the fields in not set
        if (!isset($_POST['login_email']) || !isset($_POST['login_password'])) {
            redirect_to("../login.php?msg=a field might not be set");
        }

        // check if fields are actually empty
        if (empty($_POST['login_email']) || empty($_POST['login_password'])) {
            redirect_to("../login.php?msg=a field may be empty");
        }

        // email validation
        $email = check_data($_POST['login_email']);
        $email = strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            redirect_to("../login.php?msg=".urlencode($email).":login_email is invalid");
        }

        // password validation
        $password = check_data($_POST['login_password']);

        // encrypt password -- for development purposes -- use sha1
        $password = sha1($password);
        
        // check if any of the credentials is empty
        if (empty($email) || empty($password)) {
            redirect_to("../login.php?msg=a may be empty check and try again");
        }

        // put credentials into an array
        $login_data = array($email, $password);

        // insert data into the database
        // instead of inserting we select from the database
        if (!select_from_tb($login_data)) {
            redirect_to("../login.php?msg=invalid email or password It will be wise if you create one");
        } else {

            // set a session on success
            $token = generate_session_token($email);
            set_session($token);

            // verify there session
            if (!check_session()) {
                redirect_to("../includes/logout.php?msg=session error server or connection may be down");
            } else {

                // on success, take to the main page
                redirect_to("../?login=msg=logged in successfully");

            }

        }

    } else {
        redirect_to("../login.php?msg=a sign up or login is required");
    }

?>
