<?php

    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("../index.php?msg=qid is not set");
    }

    $comment_id = urlencode($_GET['qid']);

    if (get_user_email() !== select_comment_row($comment_id)['user_email']) {
        redirect_to("../includes/logout.php");
    }

    $ids = select_comment_ids();
    $ids = array_column($ids, 0);

    if (!in_array($comment_id, $ids)) {
        redirect_to("../all_articles.php?msg=comment does not exist");
    }
    
    $article_id = select_comment_row($comment_id)['post_id'];

    if (!delete_from_tb_comments('comment_id', $comment_id)) {
        redirect_to("../article.php?qid=" . $article_id . "&msg=we need a 504 error here(couldn't delete comment ".mysqli_error($db_connection));
    }

    redirect_to("../article.php?qid=" . $article_id . "&msg=article deleted succussfully");
