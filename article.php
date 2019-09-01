<?php
	include_once "views_preprocessor.php";
	
	// read article from the database using the id from the article
	if (!isset($_GET['qid']) || $_GET['qid'] === NULL) {
		redirect_to("index.php?msg=qui+is+not+set");
	}
	
	$article_id = urlencode($_GET['qid']);

	if (!is_int($article_id)) {
		// TODO: 504 page
		redirect_to("index.php?msg=qid+is+an+int");
	}

	$read_article_query = "SELECT `post_title`, `post_content`, `post_date`, `user_email` FROM `articles` WHERE `post_id`=" . $article_id . " LIMIT 1;";

    $article_result = mysqli_query($db_connection, $read_article_query);

    if (!$article_result) {
		// TODO: 504 page
		redirect_to("login.php?msg=we+need+a+504+error+here");
	}

	$article_data = mysqli_fetch_assoc($article_result);

?>

<div class="index-body container">
	<div class="container">
		<!-- post -->
		<div class="article">

			<!-- title -->
			<h2><?=strtoupper(decode_data($article_data['post_title']));?></h2>
			
			<!-- date and author's email-->
			<span><?=$article_data['post_date'] . " - " . strtolower($article_data['user_email']);?></span>
			<br>
			<hr>

			<!-- content -->
			<div><?= decode_data(str_replace("rn", "<br>", $article_data['post_content']));?></div>
			<br><br>

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
				echo "query unsuccessful<br>";
				exit;
			}

			$comments = mysqli_fetch_all($comment_result);

		?>
		

		<!-- comment -->
		<div class="comments article">
			
			<ul class="comments-list">

				<?php
					if (!$comments) {
						echo "be the first to add a comment..";
						exit;
					}

					foreach($comments as $comment) {
						
						$comment_section = "";
						$comment_section .= "<li class='comments-list-item p-1 m-2'>";
						$comment_section .= "<div>";
						$comment_section .= "<span>";  //  user_email
						$comment_section .= strtolower($comment[3]);
						$comment_section .= "</span>";
						$comment_section .= "<p>";     // comment_text
						$comment_section .= decode_data($comment[1]);
						$comment_section .= "</p>";
						$comment_section .= "<span class='float-left'>";  // comment_id
						$comment_section .= "#31" . md5(sha1($comment[0])) ; // just goofying
						$comment_section .= "</span>";
						$comment_section .= "<span class='float-right'>";  // comment_date
						$comment_section .= $comment[2];
						$comment_section .= "</span>";
						$comment_section .= "</div>";
						$comment_section .= "</li>";

						echo $comment_section . "<br>";
					}
					
				?>

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
