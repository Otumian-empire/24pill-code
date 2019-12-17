<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php?msg=a sign up or login is required");
    }

    if (!isset($_POST['update_first_name_btn'])) {
        redirect_to("../user_profile.php?msg=click the btn");
    }

    if (!isset($_POST['update_first_name']) || empty($_POST['update_first_name'])) {
        redirect_to("../user_profile.php?msg=field is empty");
    }

    $new_first_name = strtolower(check_data($_POST['update_first_name']));

    $user_email = get_user_email();

    $update_first_name_query = "UPDATE `users` SET `user_first_name`='$new_first_name' WHERE `users`.`user_email`='$user_email' LIMIT 1";

    $update_first_name_result = mysqli_query($db_connection, $update_first_name_query);

    if (!$update_first_name_result) {
        redirect_to("../user_profile.php?msg=couldn't update user detail, try again later");
    }
    
    // send email that info has been changed
    redirect_to("../user_profile.php?msg=detail updated successfully");
