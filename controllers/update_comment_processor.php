<?php
    include_once "controller_preprocessor.php";
    
    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }
    
    if (!isset($_POST['update_comment_submit_button'])) {
        redirect_to("../all_articles.php?msg=you can not be great without putting in great effort, edit an email of yours");
    }
    
    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("../includes/logout.php");
    }

    $comment_id = urlencode($_GET['qid']);

    $ids = select_comment_ids();
    $ids = array_column($ids, 0);

    if (!in_array($comment_id, $ids)) {
        redirect_to("../all_articles.php?msg=comment does not exist");
    }

    if (get_user_email() !== select_comment_row($comment_id)['user_email']) {
        redirect_to("../includes/logout.php");
    }

    // check if any of the fields is empty
    if (empty($_POST['update_comment_content']) || empty($_POST['update_comment_content'])) {
        redirect_to("../update_comment.php?update_comment_content=" . urlencode($_POST['update_comment_content']));
    }

    $content = encode_data($_POST['update_comment_content']);

    // this is not encoded because it is been taken from the session
    $email = get_user_email();

    // update data in the database and redirect to index page
    // else, redirect to ../articles.php
    if (! update_tb_comments('comment_text', $content, 'comment_id', $comment_id)) {
        redirect_to("../update_comment.php?msg=couldn't update comment&update_comment_content=" . urlencode($_POST['update_comment_content']));
    }

    $article_id = select_comment_row($comment_id)['post_id'];
    
    redirect_to("../article.php?qid=" . $article_id . "&msg=comment updated successfully");
