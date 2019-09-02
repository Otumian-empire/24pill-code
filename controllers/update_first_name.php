<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../signup.php?msg=create a an account");
    }


    if (isset($_POST['update_first_name_btn'])) {

        if (!isset($_POST['update_first_name']) || empty($_POST['update_first_name'])) {
            redirect_to("../user_profile.php?msg=field is empty");
        }

        $new_first_name = strtolower(check_data($_POST['update_first_name']));
        $user_email = get_user_email();

        $sql_update_first_name = "UPDATE `users` SET `user_first_name`='$new_first_name' WHERE `users`.`user_email`='$user_email' LIMIT 1";

        $result = mysqli_query($db_connection, $sql_update_first_name);

        if (!$result) {
            redirect_to("../user_profile.php?msg=couldn't update user detail, try again later");
        }
        
        redirect_to("../user_profile.php?msg=detail updated successfully");

    } else {
        redirect_to("../signup.php?msg=create a an account");
    }