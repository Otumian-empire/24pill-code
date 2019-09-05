<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../signup.php?msg=create a an account");
    }

    if (!isset($_POST['update_last_name_btn'])) {
        redirect_to("../signup.php?msg=create a an account");
    }

    if (!isset($_POST['update_last_name']) || empty($_POST['update_last_name'])) {
        redirect_to("../user_profile.php?msg=field is empty");
    }

    $new_last_name = strtolower(check_data($_POST['update_last_name']));
    $user_email = get_user_email();

    $update_last_name_sql = "UPDATE `users` SET `user_last_name`='$new_last_name' WHERE `users`.`user_email`='$user_email' LIMIT 1";

    $update_last_name_result = mysqli_query($db_connection, $update_last_name_sql);

    if (!$update_last_name_result) {
        redirect_to("../user_profile.php?msg=couldn't update user detail, try again later");
    }
    
    redirect_to("../user_profile.php?msg=detail updated successfully");
