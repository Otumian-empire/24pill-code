<?php
    include_once "views_preprocessor.php";

    if (!check_session()) {
        redirect_to("includes/logout.php");
	}
	
?>


<div class="index-body container ">
	<!-- token field starts here -->
	<div class="card card-login mx-auto mt-5">

		<div class="card-header">TOKEN AND NEW EMAIL</div>

		<div class="card-body">

			<form method="post" action="controllers/email_token_processor.php" class="">

				<!-- token -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="text" class="form-control" id="token" name="token" placeholder="token">
						<label for="token" class="text-capitalize">Token</label>
					</div>
				</div>

				<!-- new email -->
				<div class="">

					<div class="form-label-group">
						<input type="email" class="form-control" id="update_email" name="update_email" placeholder="new email"/>
						<label for="new email" class="text-capitalize">New Email</label>
					</div>

				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block mb-1" name="token_btn" value="token_btn">SEND</button>

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
