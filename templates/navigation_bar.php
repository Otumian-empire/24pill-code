<?php
    // require functions to check for a session
    require_once "includes/functions.php";

?>

<!-- we add a notification div -->
<div id="notification" class="notification fixed-top"></div>

<!-- nav starts here -->
<div class="navigation-bar container-fluid col-sm-12 navbar navbar-expand-lg box fixed-top">

    <!-- logo -->
    <div class="col-sm-1">
        <a class="navbar-brand" href="./">
            <img src="statics/img/24pill-code-blue.png" alt="logo-brand" width="40" height="30">
        </a>
    </div>
	
    <!-- nav links -->
    <div class="col-sm-3">
        <a class="btn btn-sm" href="all_articles.php">Articles</a>
        <a class="btn btn-sm" href="about.php">About</a>
        <a class="btn btn-sm" href="contact.php">Contact</a>
    </div>
    
    <!-- search bar -->
     <div class="input-group col-sm-6">
        <input class="form-control py-2 border-right-0 border" type="search" placeholder="search by title, tag and or email" id="example-search-input">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary border-left-0 border" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    <!-- sign up, login, write article, logout -->
	<div class="col-sm-2">
        <?php
            // check if there user is already logged in
            if (check_session()) {
                echo "<a class='btn btn-sm' href='write_article.php'>write article</a>";
                echo "<a class='btn btn-sm' href='includes/logout.php'>log out</a>";
            } else {
                echo "<a class='btn btn-sm' href='signup.php'>sign up</a>";
                echo "<a class='btn btn-sm' href='login.php'>log in</a>";
            }

        ?>
		
    </div>
    
</div>
<!-- navigation bar ends here -->
