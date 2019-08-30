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

    <!-- write article, logout, user profile -->
	<div class="col-sm-2">
    
        <?php if (check_session()): ?>
            <div class="row col-sm-12">
                
                <div class="nav-item dropdown col-sm-auto">
                    <a class="nav-link dropdown-toggle avatar" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="statics/img/24pill-code-red.png" class="rounded-circle avatar" alt="avatar image">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                        aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item waves-effect waves-light" href="<?="user_profile.php";?>">My account</a>
                        <a class="dropdown-item waves-effect waves-light" href="<?"includes/logout.php";?>">Log out</a>
                        <a class="dropdown-item waves-effect waves-light" href='write_article.php'>write article</a>
                    </div>

                </div>
            </div>
            
        <?php else: ?>

            <a class='btn btn-sm' href='<?="signup.php";?>'>sign up</a>
            <a class='btn btn-sm' href='<?="login.php"?>'>log in</a>

        <?php endif; ?>
        
    </div>
    
</div>
<!-- navigation bar ends here -->
