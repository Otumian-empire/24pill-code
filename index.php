<?php
    include_once "views_preprocessor.php";

?>

<?php
    $read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email`, `post_id` FROM `articles` ORDER BY `post_date` DESC LIMIT 4;";
    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
        redirect_to("../login.php?error_msg=we+need+a+504+error+here");
    }

    $article_data = mysqli_fetch_all($article_result);

?>


<div class="index-body container">
    <?php if (!check_session()): ?>
        <div class="card-header">
            You can <a href="login.php">Login</a> here!!
        </div>
    <?php endif; ?>
    <div class="container">

        <?php
            if ($article_data):
                foreach ($article_data as $data):
        ?>
                    <div class="article">

                        <!-- title -->
                        <h2><?=strtoupper(decode_data($data[0]));?></h2>
                        <!-- date and author's email-->
                        <span><?=decode_data($data[2]) . " - " . strtolower(decode_data($data[3]));?></span>
                        <br><hr>

                        <!-- content -->
                        <!-- TODO: this can be a problem, replacing rn in the text -->
                        <p><?=decode_data(str_replace("rn", "<br>", $data[1]/* substr($data[1], 0, 400) */ . " ... "));?><a href="<?="article.php?qid=". decode_data($data[4]);?>"><span>more</span></a></p>
                        
                    </div>
        <?php
                endforeach;
            else:
        ?>      <div class="card mx-auto mt-5 card-register text-center">
                    <div class="card-header text-uppercase">NO Articles</div>
                    <div class="card-body text-lowercase">
                        <p>sorry no articles here yet!! <a href="<?="write_article.php";?>">Add</a> an article..</p>
                    </div>
                    
                </div>
        <?php

            endif;
        ?>
    </div>
</div>
