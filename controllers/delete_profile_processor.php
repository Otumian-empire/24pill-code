<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    if (!isset($_POST['delete_account_btn'])) {
        redirect_to("../includes/logout.php");
    }

    $user_email = get_user_email();

    // delete all comments of the user
    $delete_all_user_comments_query = "DELETE FROM `comments` WHERE `user_email` = '$user_email'";
    $delete_all_user_comments_result = mysqli_query($db_connection, $delete_all_user_comments_query);

    if (!$delete_all_user_comments_result) {
        redirect_to("../user_profile.php?msg=couldn't delete comments");
    }
    
    // delete all articles of the user
    $delete_all_user_articles_query = "DELETE FROM `articles` WHERE `user_email` = '$user_email'";
    $delete_all_user_articles_result = mysqli_query($db_connection, $delete_all_user_articles_query);

    if (!$delete_all_user_articles_result) {
        redirect_to("../user_profile.php?msg=couldn't delete articles");
    }

    // delete from user from users table
    $delete_user_query = "DELETE FROM `users` WHERE `user_email` = '$user_email'";
    $delete_user_result = mysqli_query($db_connection, $delete_user_query);

    if (!$delete_user_result) {
        redirect_to("../user_profile.php?msg=couldn't delete user");
    }

    // log user out
    redirect_to("../includes/logout.php");
