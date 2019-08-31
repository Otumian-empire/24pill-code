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
            <img src="<?="statics/img/24pill-code-blue.png";?>" alt="logo-brand" width="40" height="30">
        </a>
    </div>
	
    <!-- nav links -->
    <div class="col-sm-3">
        <a class="btn btn-sm btn-outline-primary" href="<?="./";?>">Recent</a>
        <a class="btn btn-sm btn-outline-primary" href="<?="all_articles.php";?>">Articles</a>
    </div>
    
    <!-- search bar -->
     <div class="input-group col-sm-5">
        <input class="form-control py-2 border-right-0 border" type="search" placeholder="search by title, tag and or email" id="example-search-input">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary border-left-0 border" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    <!-- write article, logout, user profile -->
	<div class="col-sm-3">
    
        <?php if (check_session()): ?>

            <a class="btn btn-small btn-outline-primary" href="<?="user_profile.php";?>">My account</a>
            <a class="btn btn-small btn-outline-primary" href="<?="write_article.php";?>">write article</a>
            <a class="btn btn-small btn-outline-primary" href="<?="includes/logout.php";?>">Log out</a>
            
        <?php endif; ?>
        
    </div>
    
</div>
<!-- navigation bar ends here -->
