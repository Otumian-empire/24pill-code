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
	if (check_session()) {
		require_once("../includes/autologout.php");
	}

?>


<!-- sign in starts here -->
<form method="post" action="../controllers/login_processor.php" class="container justify-content-center">

	<!-- email -->
	<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control-md" id="email" name="email" placeholder="Name@example.com" autofocus>
	</div>

	<!-- password -->
	<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control-md" id="password" name="password" placeholder="Password">
	</div>

	<!-- button -->
	<button type="submit" class="btn btn-primary mb-2" name="login_button" value="login_button">LOGIN</button>
</form>
<!-- form ends here -->


<?php

/* include footer */
include_once "../views_templates/footer.php";

?>
