<?php

// include header
include_once "includes/header.php";

// include navigation bar
include_once "includes/navigation_bar.php";

?>


<!-- sign in starts here -->
<form method="post" action="../controllers/login_processor.php" class="container justify-content-center">

	<!-- email -->
	<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control-md" id="user_email" name="user_email" placeholder="Name@example.com">
	</div>

	<!-- password -->
	<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control-md" id="user_email" name="user_email" placeholder="Password">
	</div>

	<!-- button -->
	<button type="submit" class="btn btn-primary mb-2">LOGIN</button>
</form>
<!-- form ends here -->


<?php

/* include footer */
include_once("includes/footer.php");

?>
    