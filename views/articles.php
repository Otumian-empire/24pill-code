<?php

    // write articles here
    // use modals edit the articles

?>

<?php
	include_once "views_safty_preprocessor.php";

	// previously, this line below here were in the preprocessor above
	// it seemed that not all needed it
	// as a measure, that the user does't break any thing, autologout user here every time..
	if (!check_session()) {
		redirect_to("../includes/logout.php");
	}
	
?>


<div class="container">
	<h1>Write article..</h1>
	<form action="../controllers/write_article_processor.php" method="post">
		<input class="form-control rounded-0" type="text" name="post_title" id="" placeholder="article header.."  autofocus />
		<!-- TODO: find a better way to add the key words -->
		<!-- look into controllers/write_article_processor.php -->
		<!-- <br>
		<input class="form-control input-group rounded-0" type="text" name="post_keywords" id="" placeholder="article key words.."> -->
		<br>
		<textarea name="post_content" id="" class="p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.."></textarea>
		<!-- <textarea name="content" id="editor" class="container p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.."></textarea> -->
		<br>
		<button name="post_submit_button" type="submit" class="btn btn-success">POST ARTICLE</button>
	</form>
	
</div>
    



<?php

/* include footer */
include_once("../views_templates/footer.php");

?>
