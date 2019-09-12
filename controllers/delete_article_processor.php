<?php
    include_once "controller_preprocessor.php";

    if (!check_session()) {
        redirect_to("../includes/logout.php");
    }

    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("../index.php?msg=qid is not set");
    }

    $article_id = urlencode($_GET['qid']);

    if (get_user_email() !== select_article_row($article_id)['user_email']) {
        redirect_to("../includes/logout.php");
    }

    $ids = select_article_ids();
    $ids = array_column($ids, 0);

    if (!in_array($article_id, $ids)) {
        redirect_to("../all_articles.php?msg=article does not exist");
    }
    
    if (!delete_from_tb_article('post_id', $article_id)) {
        redirect_to("../article.php?qid=" . $article_id . "&msg=we need a 504 error here(couldn't delete artilce ".mysqli_error($db_connection));
    }

    redirect_to("../all_articles.php?msg=article deleted succussfully");

    // delete comment after the delete of an article
    // write the code for delete article and use it here