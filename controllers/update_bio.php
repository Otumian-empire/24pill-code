<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php?msg=create a an account");
    }

    if (!isset($_POST['update_bio_btn'])) {
        redirect_to("../signup.php?msg=create a an account");
    }

    if (!isset($_POST['update_bio']) || empty($_POST['update_bio'])) {
        redirect_to("../user_profile.php?msg=field is empty");
    }

    $new_bio = strtolower(check_data($_POST['update_bio']));
    $user_email = get_user_email();

    $update_bio_sql = "UPDATE `users` SET `user_bio`='$new_bio' WHERE `users`.`user_email`='$user_email' LIMIT 1";

    $update_bio_result = mysqli_query($db_connection, $update_bio_sql);

    if (!$update_bio_result) {
        redirect_to("../user_profile.php?msg=couldn't update user detail, try again later");
    }
    
    redirect_to("../user_profile.php?msg=detail updated successfully");
