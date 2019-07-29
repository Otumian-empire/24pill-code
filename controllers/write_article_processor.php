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

		// check if any of the fields is set
		if (!isset($_POST['post_title']) || !isset($_POST['post_content'])) {
			redirect_to("../views/articles.php?post_title=".$_POST['post_title']."&post_content".$_POST['post_content']);
		} 

		// check if any of the fields is empty
		if (!empty($_POST['post_title']) && !empty($_POST['post_content'])) {
			$title = check_data($_POST['post_title']);
			// modify the way keywords are inserted
			// $keywords = check_data($_POST['post_keywords']);
			$content = check_data($_POST['post_content']);

			$email = explode("____", $_SESSION['token'])[1];

			// insert_into_articles_tb requires an array
			$post_data = array($email, $title, $content);

			// insert data in the database and redirect to index page
			// else, redirect to views/articles.php
			if (!insert_into_articles_tb($post_data)) {
				redirect_to("../views/articles.php?post_title=".$_POST['post_title']."&post_content".$_POST['post_content']);
			} else {
				redirect_to("../?posted=success");
			}
	
		} else {
			redirect_to("../views/articles.php?post_title=".$_POST['post_title']."&post_content".$_POST['post_content']);
		}
		
	} else {
		redirect_to("../views/articles.php");
	}
?>