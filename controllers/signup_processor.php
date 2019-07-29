<?php
    include_once "controller_safty_preprocessor.php"

?>


<?php
    // check if the fields are set
    if (isset($_POST['register_button'])) {

        // if any of the fields in not set
        if (!isset($_POST['sign_up_first_name']) || !isset($_POST['sign_up_last_name']) || !isset($_POST['sign_up_email']) || !isset($_POST['sign_up_password']) || !isset($_POST['sign_up_confirm_password']) || !isset($_POST['sign_up_user_bio'])) {
            redirect_to("../views/signup.php?error_msg=a+field+might+not+be+set");
        }

        // check for empty fields
        if (empty($_POST['sign_up_first_name']) || empty($_POST['sign_up_last_name']) || empty($_POST['sign_up_email']) || empty($_POST['sign_up_password']) || empty($_POST['sign_up_confirm_password']) || empty($_POST['sign_up_user_bio'])) {
            redirect_to("../views/signup.php?error_msg=a+field+might+be+empty");
        }

        $first_name = check_data($_POST['sign_up_first_name']);
        $last_name = check_data($_POST['sign_up_last_name']);

        // email validation
        $email = check_data($_POST['sign_up_email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {   
            redirect_to("../views/signup.php?error_msg=invalid+email");
        }

        // validate password
        $password = check_data($_POST['sign_up_password']);
        $confirm_password = check_data($_POST['sign_up_confirm_password']);

        if ($password !== $confirm_password) {
            redirect_to("../views/signup.php?error_msg=passwords+do+not+match");
        }

        // encrypt password -- for development purposes -- use md5
        $password = sha1($password);
        $user_bio = check_data($_POST['sign_up_user_bio']);

        // check if any of them are empty
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($user_bio)) {
            redirect_to("../views/signup.php?error_msg=a+field+maybe+empty");
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
                redirect_to("../?success=signup+successful");

            } else {
                redirect_to("../includes/logout.php?error_msg=session+error+sever+or+connection+may+be+down");
            }

        } else {
            redirect_to("../views/signup.php?error_msg=could+not+insert+into+database");
        }

    } else {
        redirect_to("../views/signup.php?error_msg=a+sign+up+or+login+is+required");
    }

?>
