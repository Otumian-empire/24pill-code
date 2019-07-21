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


<!-- use htaccess to route requests -->
<!-- sign up starts here -->
<div class="container justify-content-center">

<form method="POST" action="../controllers/signup_processor.php" class="container justify-content-center">

<!-- first name -->
<div class="form-group">
	<label for="first name">First name</label>
	<input type="text" class="form-control-md" id="first_name" name="first_name" placeholder="First name" value="" />
</div>

<!-- last name -->
<div class="form-group">
	<label for="last name">Last name</label>
	<input type="text" class="form-control-md" id="last_name" name="last_name" placeholder="Last name" value="" />
</div>

<!-- email -->
<div class="form-group">
	<label for="email">Email address</label>
	<input type="email" class="form-control-md" id="email" name="email" placeholder="Name@example.com" value="" />
</div>

<!-- password -->
<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control-md" id="password" name="password" placeholder="Password">
</div>

<!-- confirm password -->
<div class="form-group">
	<label for="confirm password">Confirm password</label>
	<input type="password" class="form-control-md" id="confirm_password" name="confirm_password" placeholder="Re-enter password">
</div>

<!-- user type [reader, author, admin] -->
<!-- <div class="form-group">
	<label for="user_type">--you want to be--</label>
	<select class="form-control-md" id="exampleFormControlSelect1" name="user_type">
		<option value="reader">Reader</option>
		<option value="author">Author</option>
		<option value="admin">Admin</option>
	</select>
</div> -->

<!-- user bio -->
<div class="form-group">
	<label for="user description">Bio</label>
	<textarea class="form-control-md" id="user_bio" name="user_bio" rows="3" placeholder="About me" value=""></textarea>
</div>

<!-- button -->
<button type="submit" class="btn btn-primary mb-2" name="register_button" value="register_button">REGISTER</button>
</form>
<!-- form ends here -->
</div>



<?php

/* include footer */
include_once("../views_templates/footer.php");

?>