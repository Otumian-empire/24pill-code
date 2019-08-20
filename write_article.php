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

<div class="index-body container-fluid">
	<div class="container">
		<h1>Write article..</h1>
		<form action="controllers/write_article_processor.php" method="post">
			<input class="form-control rounded-0" type="text" name="post_title" id="" placeholder="article header.."  value="<?php //if(isset($_GET['post_title'])) echo $_GET['post_title'];?>" autofocus />
			<!-- TODO: find a better way to add the key words -->
			<!-- look into controllers/write_article_processor.php -->
			
			<br>
			<textarea name="post_content" id="" class="p-1 md-textarea form-control rounded-0" rows="3" placeholder="article body.." value="<?php if(isset($_GET['post_content'])) { echo $_GET['post_content']; }?>"></textarea>
			
			<br>
			<button name="post_submit_button" type="submit" class="btn btn-success">POST ARTICLE</button>
		</form>
	</div>
</div>    

<?php
    /* include footer */
    include_once "templates/footer.php";

?>
