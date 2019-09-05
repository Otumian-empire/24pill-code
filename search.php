<?php
    include_once "views_preprocessor.php";


    // to be on the safer side
    // we'd check for search_query, msg and search_responds
    if (!isset($_GET['search_query'])) {
        redirect_to("index.php?msg=search by simple key words");
    }
    
    if (!isset($_GET['msg'])) {
        redirect_to('index.php?msg=request status is not set refresh page and try again');
    }

    if (!isset($_GET['search_responds'])) {
        redirect_to('index.php?msg=there was no responds to your search please try again later');
    }

    // urlencode requires a string so we'd better pass the individual elements
    // into the urlencode or encode_data
    $search_responds = json_decode($_GET['search_responds']);

?>


<div class="index-body container">

    <?php
        if ($search_responds):
            foreach ($search_responds as $data):
    ?>
                <div class="article">
                    <a href="<?="article.php?qid=". decode_data(urldecode($data[3]));?>">
                        <!-- title -->
                        <h2><?=strtoupper(decode_data(urldecode($data[0])));?></h2>
                    </a>  

                    <!-- date and author's email-->
                    <span><?=decode_data(urldecode($data[1])) . " - " . strtolower(decode_data(urldecode($data[2])));?></span>
                   
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
