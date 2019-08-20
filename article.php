<?php
    // write articles here
    // use modals edit the articles

?>

<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    // if (!check_session()) {
    //     redirect_to("includes/logout.php");
	// }
	// TODO: check session for a user before they could CRUD comment
    
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
		// TODO: remove "echo mysqli_error($db_connection);"
		// redirect_to("../login.php?error_msg=we+need+a+504+error+here");
		echo mysqli_error($db_connection);
	}

	$article_data = mysqli_fetch_assoc($article_result);

?>

<div class="index-body container-fluid">
	<div class="container">
		<!-- post -->
		<div class="article">

			<!-- title -->
			<h2><?=$article_data['post_title'];?></h2>

			<!-- content -->
			<p><?=str_replace("rn", "<br>", $article_data['post_content']);?></p>

			<!-- date and author's email-->
			<span>Date: <?=$article_data['post_date'] . " - " . $article_data['user_email'];?></span>

		</div>

		<!-- comment -->
		<div class="article input-group comment">
			<textarea class="comment-box p-1 md-textarea form-control rounded-0" placeholder="Place your comments here" type="textarea"></textarea>
			<div>
				<span class="counter input-group-append">140</span>
				<button class="btn btn-outline-secondary border-left-0 border" id="add-comment-btn">Post</button>
			</div>
			
		</div>

		<ul class="">
			<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum nulla dicta aspernatur facilis ipsa, accusamus veniam, qui cum maiores dignissimos adipisci deleniti, nam iure. Veniam quam repudiandae ea odit quaerat?</li>
		</ul>
					
	</div>

</div>    

<?php
    /* include footer */
    include_once "templates/footer.php";

?>
