<?php
    include_once "views_preprocessor.php";

    if (!check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>


<div class="index-body container ">

	<!-- token field starts here -->
	<div class="card card-login mx-auto mt-5">

		<div class="card-header">TOKEN AND NEW PASSWORD</div>

		<div class="card-body">

			<form method="post" action="controllers/password_token_processor.php" class="">

				<!-- token -->
				<div class="form-group">

					<div class="form-label-group">
						<input type="text" class="form-control" id="token" name="token" placeholder="token">
						<label for="token" class="text-capitalize">Token</label>
					</div>
					
				</div>

				<!-- new password -->
				<div class="">

					<div class="form-label-group">
						<input type="password" class="form-control" id="update_password" name="update_password" placeholder="new password"/>
						<label for="new password" class="text-capitalize">New password</label>
					</div>

				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block mb-1" name="password_token_btn" value="password_token_btn">SEND</button>

			</form>
			<!-- form ends here -->	
			
		</div>

		<div class="text-center">
        	<a class="d-block small mt-3 text-capitalize" href="<?="index.php";?>">Cancel</a>
        </div>

	</div>
	
</div>


<?php
    /* include footer */
    include_once "templates/footer.php";

?>
