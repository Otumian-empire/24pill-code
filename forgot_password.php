<?php
    // load data from the data base

?>

<?php
    include_once "views_preprocessor.php";
    
?>

<div class="index-body container">
    <div class="container">

        <div class="card card-login mx-auto mt-5">

            <div class="card-header">Reset Password</div>

            <div class="card-body">

                <div class="text-center mb-4">
                    <h4>Forgot your password?</h4>
                    <p>Enter your email address and we will send you instructions on how to reset your password.</p>
                </div>

                <form action="controllers/reset_password_processor.php" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                            <label for="inputEmail" class="text-capitalize">Enter email address</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Reset Password</button>
                </form>

                <div class="text-center">
                    <a class="d-block small mt-3 text-capitalize" href="register.php">Register an Account</a>
                    <a class="d-block small text-capitalize" href="login.php">Login Page</a>
                </div>

            </div>

        </div>

    </div>

</div>

<?php
    /* include footer */
    include_once "templates/footer.php";

?>