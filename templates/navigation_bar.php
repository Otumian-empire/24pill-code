<?php
    // require functions to check for a session
    require_once "includes/functions.php";

?>


<!-- nav starts here -->
<nav class="container-fluid col-md-12 navbar navbar-expand-lg box fixed-top mb-5">

    <!-- logo -->
    <div class="col-md-1">
        <a class="navbar-brand" href="./">
            <img src="statics/img/24pill-code-blue.png" alt="logo-brand" width="40" height="30">
        </a>
    </div>
	
    <!-- nav links -->
    <div class="col-md-3">
        <a class="btn btn-sm" href="./">Articles</a>
        <a class="btn btn-sm" href="about.php">About</a>
        <a class="btn btn-sm" href="contact.php">Contact</a>
    </div>
    
    <!-- search bar -->
     <div class="input-group col-md-6">
        <input class="form-control py-2 border-right-0 border" type="search" value="search" id="example-search-input">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary border-left-0 border" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    <!-- sign up, login, write article, logout -->
	<div class="col-md-2">
        <?php
            // check if there user is already logged in
            if (check_session()) {
                echo "<a class='btn btn-sm' href='articles.php'>write article</a>";
                echo "<a class='btn btn-sm' href='includes/logout.php'>log out</a>";
            } else {
                echo "<a class='btn btn-sm' href='signup.php'>sign up</a>";
                echo "<a class='btn btn-sm' href='login.php'>log in</a>";
            }

        ?>
		
    </div>
    
</nav>
<!-- navigation bar ends here -->
