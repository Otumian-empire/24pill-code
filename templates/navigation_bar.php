<?php
    // require functions to check for a session
    require_once "includes/functions.php";
?>

<!-- we add a notification div -->
<div id="notification" class="notification  text-lowercase"></div><!-- fixed-top -->

<nav class="navbar navbar-expand-lg navbar-light bg-light text-capitalize text-primary">

	<!-- brand -->
	<a class="navbar-brand" href="/24pill-code/"><img src="<?="statics/img/24pill-code-blue.png";?>" alt="24pil-code-logo"
			width="40" height="30"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- nav - Recent and All articles -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto list-group">
			<li class="nav-item">
				<a class="nav-link btn" href="<?='./index.php?msg=recent articles';?>">Recent <span
						class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link btn" href="<?="all_articles.php?msg=all articles";?>">Articles</a>
			</li>

		</ul>

		<!-- The search bar -->
		<!-- <div class="input-group col-sm-6 col-md col-lg"> -->
		<div class="input-group md-form form-sm form-2 pl-2 mb-1">

			<form action="controllers/search_query_preprocessor.php" method="get"
				class="form-inline col-sm col-md col-lg">
				<input class="form-control-sm border border-right-0 col-8" type="search"
					placeholder="search by title, tag and or email" id="example-search-input" name="search_query">
					<div class="input-group-append">
						<span class="">
							<button class="btn btn-sm btn-outline-secondary border-left-0 border" type="submit"
						name="search_button">
						<i class="fa fa-search"></i></button>
				</span>
					</div>
				
			</form>

		</div>

		<?php if (check_session()): ?>
			<div class="nav-item dropdown pr-5">
				<a class="btn btn-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">Options</a>

				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="btn" href="<?="user_profile.php";?>">My account</a>
					<a class="btn" href="<?="write_article.php";?>">write article</a>
					<a class="btn" href="<?="includes/logout.php";?>">Log out</a>
				</div>
			</div>
		<?php endif; ?>

	</div>

</nav>