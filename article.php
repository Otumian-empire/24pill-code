<?php
    include_once "views_preprocessor.php";
    
    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("index.php?msg=qui is not set");
    }
    
    $article_id = urlencode($_GET['qid']);

    $ids = select_article_ids();

    if (!$ids) {
        redirect_to("all_articles.php?msg=error, there is no article");
    }

    $ids = array_column($ids, 0);

?>

<?php
    if (!in_array($article_id, $ids)):
?>
		<!-- page can not be found needed here -->
		<!-- redirect_to('') -->
		<div class="index-body container">
			<div class="card mx-auto mt-5 card-register text-center">
				<p class="card-header">Page Not Found</p>';
				<p class="card-body"> Page can not be found, please visit <a href="all_articles.php">Article</a> for more</p>
			</div>
		</div>

<?php
    exit;
    endif;
?>

<?php

    $article_data = select_article_row($article_id);
    
    if (!$article_data) {
        redirect_to("login.php?msg=we need a 504 error here".mysqli_error($db_connection));
    }

?>

<div class="index-body container">

	<div class="container">

		<!-- post -->
		<div class="article">

			<!-- title -->
			<h2><?=strtoupper(decode_data($article_data['post_title']));?></h2>
			<?php if (check_session() && (get_user_email() === $article_data['user_email'])): ?>
				<span class="mr-2"><a href="update_article.php?qid=<?="$article_id";?>" class="btn btn-sm btn-success"> UPDATE </a></span>
				<span class="mr-2"><a href="controllers/delete_article_processor.php?qid=<?="$article_id";?>" class="btn btn-sm btn-danger"> DELETE </a></span>
			<?php endif;?>
			<!-- date and author's email-->
			<span><?=$article_data['post_date'] . " - " . strtolower($article_data['user_email']);?></span>
			<br>
			<hr>

			<!-- content -->
			<div><?php // echo decode_data(str_replace("rn", "<br>", $article_data['post_content']));?></div>
			<div><?= decode_data($article_data['post_content']);?></div>
			<br><br>

			<!-- comment -->
			<?php if (!check_session()): ?>
        		<div class="card card-login mx-auto mt-1">
            		<div class="card-header text-center text-capitalize">
            		You can <a href="login.php" class="btn btn-sm btn-primary">Login</a> here to add a comment!!
            		</div>
        		</div>
    		<?php exit; endif; ?>

			<div class="text-area">
				<div class="card-header">Add Comment</div>

				<form action="<?="controllers/add_comment_processor.php?qid=" . "$article_id";?>" method="post">
					<textarea class="comment-box p-1 md-textarea form-control rounded-0" placeholder="Place your comments here" type="textarea" id="comment-box" name="comment-box"></textarea>
					<br>

					<div class="input-group">
						<button class="btn btn-success btn-block" id="add-comment-btn" name="add-comment-btn">ADD</button>
					</div>

				</form>
				
			</div>

		</div>

		
		<!-- read comments from db on the page -->
		<?php
            // SELECT `comment_id`,`comment_text`, `comment_date`, `user_email` FROM `comments` WHERE  `post_id` = $post_id
            if (!isset($_GET['qid'])) {
                echo "loading the comments will take a while.<br>";
                exit;
            }

            $post_id = urlencode($_GET['qid']);

            $select_comment_query = "SELECT `comment_id`,`comment_text`, `comment_date`, `user_email` FROM `comments` WHERE  `post_id` = $post_id";

            $comment_result = mysqli_query($db_connection, $select_comment_query);

            if (!$comment_result) {
                redirect_to('article.php?msg=couldn\' add comment, try again later or report to the webmaster');
            }

            $comments = mysqli_fetch_all($comment_result);

        ?>
		

		<!-- comment -->
		<div class="comments article">
			
			<ul class="comments-list">

				<?php
                    if (!$comments) {
                        echo "be the first to add a comment..";
                    } else {
                        ?>

				<?php
                        foreach ($comments as $comment):
                ?>
							<li class='comments-list-item p-1 m-2'>
								<div>
									<?php if (get_user_email() === strtolower($comment[3])): ?>
										<span>
											<!-- edit comment -->
											<span class='mr-2'><a href='#'> EDIT </a></span> 

											<!-- delete comment -->
											<span class='mr-2'><a href='#'> DELETE </a></span> 
										</span>
									<?php endif; ?>

									<!-- user_email -->
									<span class='mr-2'><?=strtolower($comment[3]); ?> </span>

									<!-- comment_text -->
									<p>     
										<?=decode_data($comment[1]); ?>
									</p>
									<!-- comment_id, just goofying -->
									<span class='float-left'> <?="#$comment[0]" . md5(sha1($comment[0])); ?> </span>
									<!-- comment_date -->
									<span class='float-right'> <?=$comment[2]; ?> </span>
								</div>
							</li>
							<br>
				<?php
                        endforeach; ?>
				<?php
                    } ?>

				<div class="clearfix"></div>

			</ul>

		</div>

	</div>

</div>    


<script src="statics/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '.comment-box'
	});
</script>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
