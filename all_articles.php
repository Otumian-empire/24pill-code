<?php
    include_once "views_preprocessor.php";

?>

<?php
    // Select all the articles, by title, date a nd author name
    $read_article_title_query = "SELECT `post_title`, `post_date`, `user_email`, `post_id` FROM `articles` ORDER BY `post_date` DESC;";

    // SELECT `post_title`, `user_email`, `post_date` FROM `articles`
    $article_result = mysqli_query($db_connection, $read_article_title_query);

    if (!$article_result) {
        // redirect_to("../login.php?error_msg=we+need+a+504+error+here".mysqli_error($db_connection));
        echo mysqli_error($db_connection);
        exit;
    }

    $article_data = mysqli_fetch_all($article_result);

?>

<div class="index-body container-fluid">
    <?php
        if ($article_data):
            foreach ($article_data as $data):
    ?>
                <div class="article">
                    <a href=<?="article.php?qid=". $data[3];?>>
                        <!-- title -->
                        <h2><?=$data[0];?></h2>
                    </a>  

                    <!-- date and author's email-->
                    <span>Date: <?=$data[1] . " - " . $data[2];?></span>
                   
                </div>
    <?php
            endforeach;
        else:
    ?>      <div>
                <p>Sorry Note articles here yet!!!</p>
            </div>
    <?php

        endif;
    ?>
</div>