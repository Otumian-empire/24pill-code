<?php
    // require functions to check for a session
    require_once "includes/functions.php";
?>

<!-- we add a notification div -->
<div id="notification" class="notification fixed-top text-lowercase"></div>

<!-- nav starts here -->
<div class="navigation-bar container-fluid col-sm-12 col-md-12 col-lg-12 navbar navbar-expand-lg box fixed-top text-capitalize">

    <!-- logo -->
    <div class="col-sm-1 col-md-1 col-lg-1 mx-auto">
        <a class="navbar-brand col-sm-12 col-md-12 col-lg-12" href="./index.php?msg=home page">
            <img src="<?="statics/img/24pill-code-blue.png";?>" alt="logo-brand" width="40" height="30">
        </a>
    </div>
	
    <!-- nav links -->
    <div class="col-sm-2 col-md-2 col-lg-2 mx-auto">
        <a class="btn btn-sm btn-outline-primary" href="<?="./index.php?msg=recent articles";?>">Recent</a>
        <a class="btn btn-sm btn-outline-primary" href="<?="all_articles.php?msg=all articles";?>">Articles</a>
    </div>
    
    <!-- search bar -->
     <div class="input-group col-sm-6 col-md-6 col-lg-6">
        <form action="controllers/search_query_preprocessor.php" method="get" class="form-inline col-sm col-md col-lg">
            <input class="form-control-sm border border-right-0 col" type="search" placeholder="search by title, tag and or email" id="example-search-input" name="search_query">
            <span class="input-group-append">
                <button class="btn btn-sm btn-outline-secondary border-left-0 border" type="submit" name="search_button">
                <i class="fa fa-search"></i></button>
            </span>
        </form>
    </div>

    <!-- write article, logout, user profile -->
	<div class="col-sm-3 col-md-3 col-lg-3 mx-auto">
    
        <?php if (check_session()): ?>

            <a class="btn btn-sm btn-outline-primary" href="<?="user_profile.php";?>">My account</a>
            <a class="btn btn-sm btn-outline-primary" href="<?="write_article.php";?>">write article</a>
            <a class="btn btn-sm btn-outline-primary" href="<?="includes/logout.php";?>">Log out</a>
            
        <?php endif; ?>
        
    </div>
    
</div>
<!-- navigation bar ends here -->