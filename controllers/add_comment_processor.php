<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to('../includes/logout.php');
    }

    if (!isset($_POST['add-comment-btn'])) {
        redirect_to("../all_articles.php?msg=read any article of your choice");
    }
        
    if (!isset($_GET['qid']) || !isset($_POST['comment-box'])) {
        redirect_to('../index.php?msg=qid is not set');
    }
        
    // get the article id as qid from the GET array
    $post_id = urlencode($_GET['qid']);
    $post_id = encode_data($_GET['qid']);

    $user_email   = get_user_email();

    $comment_text = urlencode($_POST['comment-box']);
    $comment_text = encode_data($_POST['comment-box']);

    if (strlen($_POST['comment-box']) < 3) {
        redirect_to("../article.php?qid=" . $post_id . "&msg=a minimum of 2 characters is required to be a valid comment&comment_box=" . $comment_text);
    }

    $comment_data_list     = array($post_id, $comment_text, $user_email);
    $insert_comment_result = insert_into_tb_comment($comment_data_list);

    if (!$insert_comment_result) {
        redirect_to("../index.php?msg=insert statement failed ".urlencode(mysqli_error($db_connection)));
    }

    redirect_to("../article.php?qid=" . $post_id . "&msg=comment was added successfully");
