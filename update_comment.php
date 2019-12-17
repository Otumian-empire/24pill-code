<?php
    include_once "views_preprocessor.php";

    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
        
    if (!isset($_GET['qid']) || $_GET['qid'] === null) {
        redirect_to("index.php?msg=qid is not set");
    }
    
    $comment_id = urlencode($_GET['qid']);

    if (get_user_email() !== select_comment_row($comment_id)['user_email']) {
        redirect_to("includes/logout.php");
    }

    $ids = select_comment_ids();

    $article_id = select_comment_row($comment_id)['post_id'];

    if (!$ids) {
        redirect_to("article.php?qid=". $article_id . "&msg=error, there is no article");
    }
    
    $ids = array_column($ids, 0);
    
    if (!in_array($comment_id, $ids)) {
        redirect_to("article.php?qid=". $article_id . "&msg=article does not exist");
    }

    $comment_data = select_comment_row($comment_id);
    
    if (!$comment_data) {
        redirect_to("login.php?msg=we need a 504 error here".mysqli_error($db_connection));
    }

?>


<div class="index-body container">

	<div class="container">

		<div class="card-header">Update Comment</div>

		<form action="<?="controllers/update_comment_processor.php?qid=".$comment_id;?>" method="post">
			<div class="text-area">

				<textarea name="update_comment_content" id="update_comment_content" class="p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.." value=""><?=decode_data($comment_data['comment_text']);?></textarea>
			
				<br>
				<button name="update_comment_submit_button" type="submit" class="btn btn-success btn-block">UPDATE COMMENT</button>
				
			</div>
			
		</form>

	</div>

</div> 


<!-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script> -->
<script src="statics/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#update_comment_content'
	});
</script>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
