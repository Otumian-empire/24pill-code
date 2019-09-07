<?php
	// require the database connection
	require_once "../includes/connection.php";

	// include the function file
	include_once "../includes/functions.php";

	// get the connection instance
	$db_connection = $GLOBALS['db_connection'];

	// check if there isn't a connection
	if (!$db_connection) {
		// TODO: 504 page needed here
		redirect_to("../index.php?msg=". urlencode(mysqli_connect_error()) . " server or connection error");
	}
