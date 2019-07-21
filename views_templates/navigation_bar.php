<?php
    // require functions to check for a session
    require_once "../includes/functions.php";

?>


<!-- nav starts here -->
<nav class="container-fluid navbar mb-3 navbar-expand-lg box">
    <div class="col-md-1">
        <a class="navbar-brand" href="/24Pill-code/">
            <img src="../statics/img/24pill-code-blue.png" alt="logo-brand" width="40" height="30">
        </a>
    </div>
	
    <!-- nav links -->
    <div class="col-md-3">
        <a class="btn btn-sm" href="articles.php">Articles</a>
        <a class="btn btn-sm" href="about.php">About</a>
        <a class="btn btn-sm" href="contact.php">Contact</a>
    </div>
    
    <!-- search bar -->
    <div class="input-group col-md-4 mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-search fa-fw" aria-hidden="true"></i>
            </span>
        </div>
        <input class="form-control-sm mr-sm-2" name="search" id="search" placeholder="search 24pill-code">
    </div>  

    <!-- sign up, login, logout -->
	<div class="col-md-4">
        <?php
            // check if there user is already logged in
            if (check_session()) {
                echo "<a class='btn btn-sm' href='../includes/logout.php'>log out</a>";
            } else {
                echo "<a class='btn btn-sm' href='signup.php'>sign up</a>";
                echo "<a class='btn btn-sm' href='login.php'>log in</a>";
            }

        ?>
		
    </div>
    
</nav>
<!-- navigation bar ends here -->
