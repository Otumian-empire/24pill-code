<?php
    include_once "views_preprocessor.php";

    // user can't view this page if they are not logged in
    if (!check_session()) {
        redirect_to('signup.php?msg=you must have an account here');
    }

	// send user an email containing a token that will last for an hour
	// the token will be used as a verification code to change sensitive data
	// such as password and email

	// pull user details from the database except, password (allow user to enter password)
	$user_email = get_user_email();

	$sql_select_user_details = "SELECT `users`.`user_first_name`, `users`.`user_last_name`, `users`.`user_email`, `users`.`user_bio` FROM `users` WHERE `users`.`user_email`='$user_email' LIMIT 1";


	$result = mysqli_query($db_connection, $sql_select_user_details);

	if (!$result) {
		redirect_to("index.php?msg=couldn't read your data from our system, try refreshing your page and try again later");
		// echo '<div class="index-body container"> </div>';
		// echo mysqli_error($db_connection);
		// exit;
	}

	$user_data = mysqli_fetch_array($result);

	// echo '<div class="index-body container"> </div>';
	// print_r($user_data);
	// exit;

?>


<div class="index-body container">

    <div class="text-center text-info text-warning card-subtitle">
            <p>Make changes and click the button to update</p>
            <p>Certain information updates require further information, which would be sent to you via e-mail</p>
    </div>

	<div class="card card-update mx-auto mt-0">

		<div class="card-header">My Account</div>

        <!-- card body for first name starts here -->
		<div class="card-body text-capitalize">

            <!-- first name form starts here -->
			<form method="POST" action="controllers/update_first_name.php" class="">

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-4">
							<!-- first name -->
							<div class="form-label-group">
								<p class="form-control border-0"  name="update_first_name" ><?=$user_data['user_first_name'];?></p>
								<label for="first name" class="text-capitalize">Current First name</label>
							</div>

						</div>

						<div class="col-md-5">

							<!-- new first name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="last_name" name="update_first_name" placeholder="new first name"  autofocus/>
								<label for="new first name" class="text-capitalize">New First name</label>
							</div>

						</div>

                        <div class="col-md-2">

							<!-- first name update button -->
							<div class="form-label-group">
								<button class="form-control-sm btn btn-primary text-capitalize" id="last_name" name="update_first_name_btn" placeholder="Last name" type="submit" >GO</button>
							</div>

						</div>
					
					</div>
					
				</div>
				
			</form>
			<!-- first name form ends here -->

		</div>
        <!-- card body for first name ends here -->

        <hr>

        <!-- card body for last name starts here -->
        <div class="card-body text-capitalize">
            <!-- last name form starts here -->
			<form method="POST" action="controllers/update_last_name.php" class="">

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-4">
							<!-- last name -->
							<div class="form-label-group">
								<p class="form-control border-0" name="update_last_name"><?=$user_data['user_last_name'];?></p>
								<label for="last name" class="text-capitalize">Current Last name</label>
							</div>

						</div>

						<div class="col-md-5">
							<!-- new last name -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="update_last_name" name="update_last_name" placeholder="new last name"/>
								<label for="last name" class="text-capitalize">New Last name</label>
							</div>

						</div>

                        <div class="col-md-2">
							<!-- last name update button -->
							<div class="form-label-group">
								<button class="form-control-sm btn btn-primary text-capitalize" id="update_last_name_btn" name="update_last_name_btn" type="submit" >GO</button>
							</div>

						</div>
					
					</div>
					
				</div>
				
			</form>
			<!-- last name form ends here -->

		</div>
        <!-- card body for last name ends here -->

        <hr>

        <!-- card body for email starts here -->
        <div class="card-body text-capitalize">
            <!-- email form starts here -->
			<form method="POST" action="controllers/update_email.php" class="">

				<div class="form-group">
					<div class="form-row">

						<div class="col-md-4">
							<!-- email -->
							<div class="form-label-group">
								<p class="form-control border-0" ><?=$user_data['user_email'];?></p>
								<label for="email name" class="text-capitalize">Current email</label>
							</div>

						</div>

						<div class="col-md-5">
							<!-- new email -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="update_email" name="update_email" placeholder="new email" autofocus/>
								<label for="email" class="text-capitalize">New email</label>
							</div>

						</div>

                        <div class="col-md-2">
							<!-- email update button -->
							<div class="form-label-group">
								<button class="form-control-sm btn btn-primary text-capitalize" id="update_email" name="update_email" type="submit" >GO</button>
							</div>

						</div>
					
					</div>
					
				</div>
				
			</form>
			<!-- email form ends here -->

		</div>
        <!-- card body for email ends here -->

        <hr>

        <!-- card body for password starts here -->
        <div class="card-body text-capitalize">

            <!-- password form starts here -->
			<form method="POST" action="controllers/update_password.php" class="">

				<div class="form-group">

					<div class="form-row">

						<div class="col-md-4">
							<!-- password -->

							<div class="form-label-group">
								<p class="form-control border-0">User password</p>
								<label for="password name" class="text-capitalize">Current password</label>
							</div>

						</div>

						<div class="col-md-5">
							<!-- new password -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="update_password" name="update_password" placeholder="new password"/>
								<label for="new password" class="text-capitalize">New password</label>
							</div>

						</div>

                        <div class="col-md-2">
							<!-- password update button -->
							<div class="form-label-group">
								<button class="form-control-sm btn btn-primary text-capitalize" id="update_password" name="sign_up_last_name" type="submit" >GO</button>
							</div>

						</div>
					
					</div>
					
				</div>
				
			</form>
			<!-- password form ends here -->

		</div>
        <!-- card body for password ends here -->

        <hr>

        <!-- card body for bio starts here -->
        <div class="card-body text-capitalize">

            <!-- bio form starts here -->
			<form method="POST" action="controllers/update_bio.php" class="">

				<div class="form-group">

					<div class="form-row">

						<div class="col-md-4">

							<!-- bio -->
							<div class="form-label-group">
								<p class="form-control border-0"><?=$user_data['user_bio'];?></p>
								<label for="bio name" class="text-capitalize">Current bio</label>
							</div>

						</div>

						<div class="col-md-5">

							<!-- new bio -->
							<div class="form-label-group">
								<input type="text" class="form-control" id="update_bio" name="update_bio" placeholder="new bio"  autofocus/>
								<label for="bio" class="text-capitalize">New bio</label>
							</div>

						</div>

                        <div class="col-md-2">
							<!-- bio update button -->
							<div class="form-label-group">
								<button class="form-control-sm btn btn-primary text-capitalize" id="update_bio_btn" name="update_bio_btn" type="submit" >GO</button>
							</div>

						</div>
					
					</div>
					
				</div>
				
			</form>
			<!-- bio form ends here -->

		</div>
        <!-- card body for bio ends here -->

	</div>

</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>