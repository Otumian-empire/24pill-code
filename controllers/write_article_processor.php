<?php
    include_once "controller_preprocessor.php"
?>


<?php
	if (isset($_POST['post_submit_button'])) {

		// check if any of the fields is set
		if (!isset($_POST['post_title']) || !isset($_POST['post_content'])) {
			redirect_to("../write_article.php?post_title=".urlencode($_POST['post_title'])."&post_content".urlencode($_POST['post_content']));
		} 

		// check if any of the fields is empty
		if (!empty($_POST['post_title']) && !empty($_POST['post_content'])) {

			$title = encode_data($_POST['post_title']);

			// modify the way keywords are inserted
			// $keywords = check_data($_POST['post_keywords']);

			$content = encode_data($_POST['post_content']);

			// this is not encoded because it is been taken from the session
			$email = get_user_email();

			// insert_into_articles_tb requires an array
			$post_data = array($email, $title, $content);

			// insert data in the database and redirect to index page
			// else, redirect to ../articles.php
			if (!insert_into_articles_tb($post_data)) {
				redirect_to("../write_article.php?post_title=" . urlencode($_POST['post_title']) . "&post_content=" . urlencode($_POST['post_content']));
			} else {
				redirect_to("../?success_smg=article+posted+successfully");
			}
	
		} else {
			redirect_to("../write_article.php?post_title=" . urlencode($_POST['post_title']) . "&post_content=" . urlencode($_POST['post_content']));
		}
		
	} else {
		redirect_to("../write_article.php?msg=you+can+not+be+great+without+putting+in+great+effort");
	}

?>
