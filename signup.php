<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
    // as a measure, that the user does't break any thing, autologout user here every time..
    if (check_session()) {
        redirect_to("includes/logout.php?msg=you have been redirected sign up or login needed");
    }

?>

<div class="index-body container">

	<!-- TODO: use htaccess to route requests -->
	<!-- TODO: sign up starts here -->
	<div class="card card-register mx-auto mt-0">

		<div class="card-header">Create an Account</div>

		<div class="card-body">
		
			<form method="POST" action="controllers/signup_processor.php" class="">

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-6">
							<!-- first name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="sign_up_first_name" name="sign_up_first_name" placeholder="First name" value="<?php if (isset($_GET['sign_up_first_name'])) { echo urldecode($_GET['sign_up_first_name']); } ?>" autofocus/>
								<label for="first name" class="text-capitalize">First name</label>
							</div>

						</div>

						<div class="col-md-6">
							<!-- last name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="sign_up_last_name" name="sign_up_last_name" placeholder="Last name" value="<?php if (isset($_GET['sign_up_last_name'])) { echo urldecode($_GET['sign_up_last_name']); } ?>" />
								<label for="last name" class="text-capitalize">Last name</label>
							</div>

						</div>
					
					</div>
					
				</div>
				

				<!-- email -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="email" class="form-control" id="sign_up_email" name="sign_up_email" placeholder="Name@example.com" value="<?php if (isset($_GET['sign_up_email'])) { echo urldecode($_GET['sign_up_email']); } ?>" />
						<label for="email">Email address</label>
					</div>
				</div>

				<div class="form-group">

					<div class="form-row">

						<div class="col-md-6">

							<!-- password -->
							<div class="form-label-group">
								<input type="password" class="form-control" id="password" name="sign_up_password" placeholder="Password">
								<label for="password" class="text-capitalize">Password</label>
							</div>

						</div>

						<div class="col-md-6">

							<!-- confirm password -->
							<div class="form-label-group">
								<input type="password" class="form-control" id="confirm_password" name="sign_up_confirm_password" placeholder="Re-enter password">
								<label for="confirm password" class="text-capitalize">Confirm password</label>
							</div>

						</div>
					
					</div>
					
				</div>

				<!-- user bio -->
				<div class="form-group">

					<div class="form-label-group">

						<textarea class="form-control" id="user_bio" name="sign_up_user_bio" rows="3" placeholder="About me"><?php if (isset($_GET['sign_up_user_bio'])) { echo urldecode($_GET['sign_up_user_bio']); } ?></textarea>
						<label for="user description" class="text-capitalize">Bio</label>

					</div>

				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block" name="register_button" value="register_button">REGISTER</button>

			</form>
			<!-- form ends here -->

		</div>

		<div class="text-center">

			<a class="d-block small mt-3 text-capitalize" href="<?="login.php";?>">Login Page</a>
			
		</div>
		
	</div>

</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
