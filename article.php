<?php
	include_once "views_preprocessor.php";
	
	// read article from the database using the id from the article
	if (!isset($_GET['qid']) || $_GET['qid'] === NULL) {
		redirect_to("index.php");
	}
	
	$article_id = $_GET['qid'];

	$read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` WHERE `post_id`=" . $article_id. " LIMIT 1;";

    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
		// TODO: remove "echo mysqli_error($db_connection);"
		// redirect_to("../login.php?error_msg=we+need+a+504+error+here");
		echo mysqli_error($db_connection);
	}

	$article_data = mysqli_fetch_assoc($article_result);

?>

<div class="index-body container">
	<div class="container">
		<!-- post -->
		<div class="article">

			<!-- title -->
			<h2><?=$article_data['post_title'];?></h2>
			
			<!-- date and author's email-->
			<span>Date: <?=$article_data['post_date'] . " - " . $article_data['user_email'];?></span>
			<br>
			<hr>

			<!-- content -->
			<div><?= decode_data(str_replace("rn", "<br>", $article_data['post_content']));?></div>
			<br><br>

			<div class="text-area">
				<form action="<?="controllers/add_comment_processor.php?qid=" . "$article_id";?>" method="post">
					<textarea class="comment-box p-1 md-textarea form-control rounded-0" placeholder="Place your comments here" type="textarea" id="comment-box" name="comment-box"></textarea>
					<br>
					<div class="input-group">
						<button class="btn btn-success border-left-0 border" id="add-comment-btn" name="add-comment-btn">ADD</button>
					</div>
				</form>
				
			</div>

			

		</div>

		
		<!-- read comments from db on the page -->
		

		<!-- comment -->
		<div class="comments">
			
			<ul class="comments-list">
				<li class="comments-list-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum nulla dicta aspernatur facilis ipsa, accusamus veniam, qui cum maiores dignissimos adipisci deleniti, nam iure. Veniam quam repudiandae ea odit quaerat?</li>
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