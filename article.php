<?php
    // write articles here
    // use modals edit the articles

?>

<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>

<?php
	// read article from the database using the id from the article
	if (!isset($_GET['qid']) || $_GET['qid'] === NULL) {
		redirect_to("index.php");
	}
	
	$article_id = $_GET['qid'];

	$read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` WHERE `post_id`=" . $article_id. " LIMIT 1;";

    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
		// redirect_to("../login.php?error_msg=we+need+a+504 +error+here");
		echo mysqli_error($db_connection);
	}

	$article_data = mysqli_fetch_assoc($article_result);
	// print_r($article_data);

?>

<div class="index-body container-fluid">
	<div class="container">
		<?php 
		// print_r($article_id);
		// print_r($article_data);
		// exit;
			// if(mysqli_num_rows($article_data) > 0):
				/* print_r($article_data);
		exit; */
				// foreach ($article_data as $data): 
		?>
					<div class="article">

						<!-- title -->
						<h2><?=$article_data['post_title'];?></h2>

						<!-- content -->
						<p><?=str_replace("rn", "<br>", $article_data['post_content']);?></p>

						<!-- date and author's email-->
						<span>Date: <?=$article_data['post_date'] . " - " . $article_data['user_email'];?></span>

					</div>
					

		<?php
				// endforeach;
			// else:
		?>
				<!-- <div class="article">
					<p >Article not found</p>
				</div> -->
		<?php 
				
		// 	endif;
		?>
	</div>
</div>    

<?php
    /* include footer */
    include_once "templates/footer.php";

?>
