<?php
    include_once "views_preprocessor.php";

?>

<?php
    $read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` ORDER BY `post_date` DESC LIMIT 10;";
    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
        redirect_to("../login.php?error_msg=we+need+a+504 +error+here");
    }

    $article_data = mysqli_fetch_all($article_result);

?>

<?php
    if ($article_data):
        foreach ($article_data as $data):
?>
            <div>

                <!-- title -->
                <h2><?=$data[0];?></h2>

                <!-- email -->
                <span><?=$data[3];?></span>

                <!-- content -->
                <p><?=str_replace("rn", "<br>", $data[1]);?></p>

                <!-- date -->
                <span><?=$data[2];?></span>

            </div>
<?php
        endforeach;
    else:
?>

        <div>
            <p>Sorry Note articles here yet!!!</p>
        </div>
<?php
    endif;
?>