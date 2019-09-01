<?php
    include_once "views_preprocessor.php";

?>

<?php
    // to be on the safer side
    // we'd check for search_query, msg and search_responds
    if (!isset($_GET['search_query'])) {
        redirect_to("../?msg=search+by+simple+key+words");
    }
    
    if (!isset($_GET['msg'])) {
        redirect_to('../?msg=request+status+is+not+set+refresh+page+and+try+again');
    }

    if (!isset($_GET['search_responds'])) {
        redirect_to('../?msg=there+was+no+responds+to+your+search+please+try+again+later');
    }

    $search_responds = json_decode($_GET['search_responds']);

    /* 
    // Select all the articles, by title, date and author name
    $read_article_title_query = "SELECT `post_title`, `post_date`, `user_email`, `post_id` FROM `articles` ORDER BY `post_date` DESC;";

    // SELECT `post_title`, `user_email`, `post_date` FROM `articles`
    $article_result = mysqli_query($db_connection, $read_article_title_query);

    if (!$article_result) {
        // redirect_to("../login.php?msg=we+need+a+504+error+here".mysqli_error($db_connection));
        echo mysqli_error($db_connection);
        exit;
    }

    $article_data = mysqli_fetch_all($article_result);
    */
?>


<div class="index-body container">

    <?php
        if ($search_responds):
            foreach ($search_responds as $data):
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
    <?php

        endif;
    ?>
</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>