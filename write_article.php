<?php
    // TODO: use modals edit the articles

    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>


<div class="index-body container">

	<div class="container">

		<!-- <h1>Write article..</h1> -->
		<div class="card-header">Write Article</div>

		<form action="controllers/write_article_processor.php" method="post">

			<input class="form-control rounded-0" type="text" name="post_title" id="" placeholder="article header.."  value="<?php //if(isset($_GET['post_title'])) echo $_GET['post_title'];?>" autofocus />
			<!-- TODO: find a better way to add the key words -->
			<!-- look into controllers/write_article_processor.php -->
			
			<br>
			<div class="text-area">

				<textarea name="post_content" id="post_content" class="p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.." value="<?php if (isset($_GET['post_content'])) {
    echo $_GET['post_content'];
}?>"></textarea>
			
				<br>
				<button name="post_submit_button" type="submit" class="btn btn-success btn-block">POST ARTICLE</button>	
				
			</div>
			
		</form>

	</div>

</div> 


<!-- <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script> -->
<script src="statics/js/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#post_content'
	});
</script>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
