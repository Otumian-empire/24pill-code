<?php

    include_once "views_preprocessor.php";

    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
    	
	if (!isset($_GET['qid']) || $_GET['qid'] === NULL) {
		redirect_to("index.php?msg=qid is not set");
	}
	
	$article_id = urlencode($_GET['qid']);

    $ids = select_article_ids();

	if (!$ids) {
		redirect_to("all_articles.php?msg=error, there is no article");
	}
	
    $ids = array_column($ids,0);
    
    if (!in_array($article_id, $ids)) {
        redirect_to("all_articles.php?msg=article does not exist");
    }

    $article_data = select_article_row($article_id);
	
	if (!$article_data) {
		redirect_to("login.php?msg=we need a 504 error here".mysqli_error($db_connection));
	}

?>


<div class="index-body container">

	<div class="container">

		<div class="card-header">Update Article</div>

		<form action="<?="controllers/update_article_processor.php?qid=".$article_id;?>" method="post">

			<input class="form-control rounded-0" type="text" name="update_post_title" id="update_post_title" placeholder="article header.."  value="<?=decode_data($article_data['post_title']);?>" autofocus />

			<!-- TODO: find a better way to add the key words -->
			<!-- look into controllers/write_article_processor.php -->
			
			<br>
			<div class="text-area">

				<textarea name="update_post_content" id="update_post_content" class="p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.." value=""><?=decode_data($article_data['post_content']);?></textarea>
			
				<br>
				<button name="update_post_submit_button" type="submit" class="btn btn-success btn-block">UPDATE ARTICLE</button>	
				
			</div>
			
		</form>

	</div>

</div> 


<!-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script> -->
<script src="statics/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#update_post_content'
	});
</script>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
