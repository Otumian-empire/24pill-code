<?php
	include_once "views_safty_preprocessor.php";

	// previously, this line below here were in the preprocessor above
	// it seemed that not all needed it
	// as a measure, that the user does't break any thing, autologout user here every time..
	if (check_session()) {
		redirect_to("../includes/logout.php?error_msg=you+have+been+redirected+sign+up+or+login+needed");
	}

?>


<!-- use htaccess to route requests -->
<!-- sign up starts here -->
<div class="container justify-content-center">

	<form method="POST" action="../controllers/signup_processor.php" class="container justify-content-center">

		<!-- first name -->
		<div class="form-group">
			<label for="first name">First name</label>
			<input type="text" class="form-control-md" id="first_name" name="sign_up_first_name" placeholder="First name" value="" autofocus/>
		</div>

		<!-- last name -->
		<div class="form-group">
			<label for="last name">Last name</label>
			<input type="text" class="form-control-md" id="last_name" name="sign_up_last_name" placeholder="Last name" value="" />
		</div>

		<!-- email -->
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control-md" id="email" name="sign_up_email" placeholder="Name@example.com" value="" />
		</div>

		<!-- password -->
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control-md" id="password" name="sign_up_password" placeholder="Password">
		</div>

		<!-- confirm password -->
		<div class="form-group">
			<label for="confirm password">Confirm password</label>
			<input type="password" class="form-control-md" id="confirm_password" name="sign_up_confirm_password" placeholder="Re-enter password">
		</div>

		<!-- user bio -->
		<div class="form-group">
			<label for="user description">Bio</label>
			<textarea class="form-control-md" id="user_bio" name="sign_up_user_bio" rows="3" placeholder="About me" value=""></textarea>
		</div>

		<!-- button -->
		<button type="submit" class="btn btn-primary mb-2" name="register_button" value="register_button">REGISTER</button>
	</form>
	<!-- form ends here -->
</div>


<?php

/* include footer */
include_once "../views_templates/footer.php";

?>
