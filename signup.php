<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    if (check_session()) {
        redirect_to("includes/logout.php?error_msg=you+have+been+redirected+sign+up+or+login+needed");
    }

?>

<div class="index-body container">
		<!-- use htaccess to route requests -->
	<!-- sign up starts here -->
	<div class="card card-register mx-auto mt-0">
		<div class="card-header">Create an Account</div>
		<div class="card-body">
			<form method="POST" action="controllers/signup_processor.php" class="">

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-6">
							<!-- first name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="first_name" name="sign_up_first_name" placeholder="First name" value="" autofocus/>
								<label for="first name">First name</label>
							</div>
						</div>

						<div class="col-md-6">
							<!-- last name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="last_name" name="sign_up_last_name" placeholder="Last name" value="" />
								<label for="last name">Last name</label>
							</div>
						</div>
					
					</div>
					
				</div>
				

				<!-- email -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="email" class="form-control" id="email" name="sign_up_email" placeholder="Name@example.com" value="" />
						<label for="email">Email address</label>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-6">
							<!-- password -->
							<div class="form-label-group">
								<input type="password" class="form-control" id="password" name="sign_up_password" placeholder="Password">
								<label for="password">Password</label>
							</div>
						</div>

						<div class="col-md-6">
							<!-- confirm password -->
							<div class="form-label-group">
								<input type="password" class="form-control" id="confirm_password" name="sign_up_confirm_password" placeholder="Re-enter password">
								<label for="confirm password">Confirm password</label>
							</div>
						</div>
					
					</div>
					
				</div>

				<!-- user bio -->
				<div class="form-group">
					<div class="form-label-group">
						<textarea class="form-control" id="user_bio" name="sign_up_user_bio" rows="3" placeholder="About me" value=""></textarea>
						<label for="user description">Bio</label>
					</div>
				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block" name="register_button" value="register_button">REGISTER</button>

			</form>
			<!-- form ends here -->

		</div>

		<div class="text-center">
			<a class="d-block small mt-3" href="login.php">Login Page</a>
		</div>
		
	</div>

</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
