<?php

    // write articles here
    // use modals edit the articles

?>

<?php
	// require the connection
	require_once "../includes/connection.php";

	// require the functions
	require_once "../includes/functions.php";

	// include header
	include_once "../views_templates/header.php";

	// include navigation bar
	include_once "../views_templates/navigation_bar.php";

	// check if there is connection
	$db_connection = $GLOBALS['db_connection'];

    if (!isset($db_connection)) {
		echo "Error " . mysqli_connect_error() . "<br>";
	}

	// as a measure, that the user does't break any thing, autologout user here every time..
	if (!check_session()) {
		require_once("../includes/autologout.php");
	}

?>

<div class="container">
	<h1>Write article..</h1>
	<form action="../controllers/write_article_processor.php" method="post">
		<textarea name="content" id="editor" class="container p-1 md-textarea form-control rounded-0" rows="3" placeholder="write article..." autofocus></textarea>
		<br>
		<button type="submit" class="btn btn-success">POST ARTICLE</button>
	</form>
	
</div>
    



<?php

/* include footer */
include_once("../views_templates/footer.php");

?>
