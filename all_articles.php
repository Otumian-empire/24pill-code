<?php
    include_once "views_preprocessor.php";

?>

<?php
    // Select all the articles, by title, date a nd author name
    $read_article_title_query = "SELECT `post_title`, `post_date`, `user_email`, `post_id` FROM `articles` ORDER BY `post_date` DESC;";

    // SELECT `post_title`, `user_email`, `post_date` FROM `articles`
    $article_result = mysqli_query($db_connection, $read_article_title_query);

    if (!$article_result) {
        redirect_to("index.php?msg=we+need+a+504+error+here".urlencode(mysqli_error($db_connection)));
    }

    $article_data = mysqli_fetch_all($article_result);

?>


<div class="index-body container">

    <?php
        if ($article_data):
            foreach ($article_data as $data):
    ?>
                <div class="article">
                    <a href="<?="article.php?qid=". decode_data($data[3]);?>">
                        <!-- title -->
                        <h2><?=strtoupper(decode_data($data[0]));?></h2>
                    </a>  

                    <!-- date and author's email-->
                    <span><?=decode_data($data[1]) . " - " . strtolower(decode_data($data[2]));?></span>
                   
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
            
    <?php endif; ?>

</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
