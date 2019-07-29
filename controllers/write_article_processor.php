<?php
	// require the database connection
	require_once "../includes/connection.php";

	// include the function file
	include_once "../includes/functions.php";

	// get the connection instance
	$db_connection = $GLOBALS['db_connection'];

	// check if there isn't a connection
	if (!$db_connection) {
		header("Location: ../views/signup.php");
		exit;
	}

	// verify there session
	if (!check_session()) {
		redirect_to("../includes/logout.php");
	}

	if (isset($_POST['post_submit_button'])) {

		// check if any of the fields is empty
		if (!isset($_POST['post_title']) || !isset($_POST['post_keywords']) || !isset($_POST['post_content'])) {
			redirect_to("../views/articles.php?post_title=".$_POST['post_title']."&post_keywords".$_POST['post_keywords']."&post_content".$_POST['post_content']);
		} else {
			$title = check_data($_POST['post_title']);
			// modify the way keywords are inserted
			// $keywords = check_data($_POST['post_keywords']);
			$content = check_data($_POST['post_content']);

			

		}
	} else {
		redirect_to("../views/articles.php");
	}
?>