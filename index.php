<?php
    include_once "views_preprocessor.php";

?>

<?php
    $read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` ORDER BY `post_date` DESC LIMIT 4;";
    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
        redirect_to("../login.php?error_msg=we+need+a+504+error+here");
    }

    $article_data = mysqli_fetch_all($article_result);

?>

<div class="index-body container">
    <?php
        if ($article_data):
            foreach ($article_data as $data):
    ?>
                <div class="article">

                    <!-- title -->
                    <h2><?=$data[0];?></h2>
                    <!-- date and author's email-->
                    <span>Date: <?=$data[2] . " - " . $data[3];?></span>
                    <br><hr>

                    <!-- content -->
                    <!-- TODO: this can be a problem, replacing rn in the text -->
                    <p><?=decode_data(str_replace("rn", "<br>", substr($data[1], 0, 400) . "... "));?><a href="#"><span>more</span></a></p>
                    
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
