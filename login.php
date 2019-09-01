<?php
    include_once "views_preprocessor.php";

    // previously, this line below here were in the preprocessor above
    // it seemed that not all needed it
	// as a measure, that the user does't break any thing, autologout user here every time..
	// after a user logs in an intensionally goes back, force log the user out
    if (check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>


<div class="index-body container ">
	<!-- sign in starts here -->
	<div class="card card-login mx-auto mt-5">

		<div class="card-header">Login</div>

		<div class="card-body">

			<form method="post" action="controllers/login_processor.php" class="">

				<!-- email -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="email" class="form-control" id="email" name="login_email" placeholder="Name@example.com" autofocus>
						<label for="email" class="text-capitalize">Email address</label>
					</div>
				</div>

				<!-- password -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="password" class="form-control" id="password" name="login_password" placeholder="Password">
						<label for="password" class="text-capitalize">Password</label>
					</div>
				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block" name="login_button" value="login_button">LOGIN</button>

			</form>
			<!-- form ends here -->	
		</div>

		<div class="text-center">
        	<a class="d-block small mt-3 text-capitalize" href="<?="signup.php";?>">Register an Account</a>
        	<a class="d-block small text-capitalize" href="<?="forgot_password.php";?>">Forgot Password?</a>
        </div>

	</div>
	
</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
