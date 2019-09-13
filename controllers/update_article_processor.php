<?php
    include_once "controller_preprocessor.php";
    
    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }
    
    if (!isset($_POST['update_post_submit_button'])) {
        redirect_to("../write_article.php?msg=you can not be great without putting in great effort");
    }
    
    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("../includes/logout.php");
    }

    $article_id = urlencode($_GET['qid']);

    if (get_user_email() !== select_article_row($article_id)['user_email']) {
        redirect_to("../includes/logout.php");
    }

    // check if any of the fields is set
    if (!isset($_POST['update_post_title']) || !isset($_POST['update_post_content'])) {
        redirect_to("../write_article.php?update_post_title=".urlencode($_POST['update_post_title'])."&update_post_content".urlencode($_POST['update_post_content']));
    }

    // check if any of the fields is empty
    if (empty($_POST['update_post_title']) || empty($_POST['update_post_content'])) {
        redirect_to("../write_article.php?update_post_title=" . urlencode($_POST['update_post_title']) . "&update_post_content=" . urlencode($_POST['update_post_content']));
    }

    $title = encode_data($_POST['update_post_title']);

    // modify the way keywords are inserted
    // $keywords = check_data($_POST['post_keywords']);

    $content = encode_data($_POST['update_post_content']);

    // this is not encoded because it is been taken from the session
    $email = get_user_email();

    // update data in the database and redirect to index page
    // else, redirect to ../articles.php
    if (! update_tb_articles('post_title', $title, 'post_id', $article_id)) {
        redirect_to("../write_article.php?msg=couldn't update the article title&update_post_title=" . urlencode($_POST['update_post_title']) . "&update_post_content=" . urlencode($_POST['update_post_content']));
    }

    if (! update_tb_articles('post_content', $content, 'post_id', $article_id)) {
        redirect_to("../write_article.php?msg=couldn't update the article content&update_post_title=" . urlencode($_POST['update_post_title']) . "&update_post_content=" . urlencode($_POST['update_post_content']));
    }

    redirect_to("../article.php?qid=" . $article_id . "&msg=article updated successfully");
