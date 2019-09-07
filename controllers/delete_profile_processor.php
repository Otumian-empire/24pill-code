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
    if (!delete_all_user_comments('user_email', $user_email)) {
        redirect_to("../user_profile.php?msg=couldn't delete comments");
    }
    
    // delete all articles of the user
    if (!delete_all_user_articles('user_email', $user_email)) {
        redirect_to("../user_profile.php?msg=couldn't delete articles ".mysqli_error($db_conne));
    }

    // delete from user from users table
    if (!delete_from_tb_user('user_email', $user_email)) {
        redirect_to("../user_profile.php?msg=couldn't delete user");
    }

    // log user out
    redirect_to("../includes/logout.php");
