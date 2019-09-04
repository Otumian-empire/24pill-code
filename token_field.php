<?php
    include_once "views_preprocessor.php";

    if (check_session()) {
        redirect_to("includes/logout.php");
    }
    
?>


<div class="index-body container ">
	<!-- token field starts here -->
	<div class="card card-login mx-auto mt-5">

		<div class="card-header">TOKEN</div>

		<div class="card-body">

			<form method="post" action="controllers/token_processor.php" class="">


				<!-- password -->
				<div class="form-group">
					<div class="form-label-group">
						<input type="password" class="form-control" id="token" name="token" placeholder="token">
						<label for="password" class="text-capitalize">Token</label>
					</div>
				</div>

				<!-- button -->
				<button type="submit" class="btn btn-primary btn-block" name="token_btn" value="token_btn">SEND</button>

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
