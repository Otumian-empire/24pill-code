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

    if (!$db_connection) {
		redirect_to("../?error_msg=". mysqli_connect_error() . "+server+or+connection+error");
	}

?>
