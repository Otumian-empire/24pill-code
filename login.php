<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    if (check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>

<div class="index-body container-fluid">
	<!-- sign in starts here -->
	<form method="post" action="controllers/login_processor.php" class="container justify-content-center">

		<!-- email -->
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control-md" id="email" name="login_email" placeholder="Name@example.com" autofocus>
		</div>

		<!-- password -->
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control-md" id="password" name="login_password" placeholder="Password">
		</div>

		<!-- button -->
		<button type="submit" class="btn btn-primary mb-2" name="login_button" value="login_button">LOGIN</button>

	</form>
	<!-- form ends here -->
</div>

<?php
    /* include footer */
    include_once "templates/footer.php";

?>
