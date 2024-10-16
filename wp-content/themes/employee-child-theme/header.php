<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
<!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1QMV5T16WP"></script>
  <script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
  
	gtag('config', 'G-1QMV5T16WP');
  </script>

    <meta charset="utf-8" />
    <title><?php if (is_home() ) {?>News | <?php } ?><?php if (is_page() ) {the_title();?> | <?php } ?><?php if ( is_single() ) {the_title(); ?> | <?php } ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//www.google.ca/jsapi" type="text/javascript"></script><!-- Google Custom Search API -->
   		<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600" rel="stylesheet">
    	<!--end Fonts -->
	<link rel="stylesheet" type="text/css" href="https://globalassets.provo.edu/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="https://globalassets.provo.edu/slick/slick-theme.css"/>

	<meta name="theme-color" content="#ffffff ">
	<?php wp_head(); ?>
	<link href="https://customer.cludo.com/css/templates/v1.1/essentials/cludo-search.min.css" type="text/css" rel="stylesheet">
   </head>
  <body <?php body_class(); ?>>
  <a href="#mainContent" class="skip-nav-link">
		skip navigation
	</a>
	<header id="mainHeader">

		<div class="siteLogo griditem">
			<a href="https://provo.edu">
				<img alt="Provo City School District Home" class="websiteLogo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo/pcsd-logo-website-header-x2.png" />
			</a>

			<!-- <address>
				<p class="headerContact">280 West 940 North Provo, Utah <span>801-374-4800</span></p>
			</address> -->

		</div>

		<!-- <nav class="siteNav griditem"> -->
		<nav id="navbar">
			<!-- <a><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/dark/menu.png" alt=""> Menu</a> -->
			<!-- <ul class="">
				<li class="student"><a href="https://sandbox.provo.edu:8443/student-family-essentials/">Student Essentials</a></li>
				<li class="employee"><a href="https://employee.provo.edu">Employee Essentials</a></li>
				<li class="community"><a href="https://sandbox.provo.edu:8443/community-essentials/">Community Essentials</a></li>
			</ul> -->
			<?php wp_nav_menu(array('menu' => 'header-menu')); ?>

		</nav>
		<div class="siteSearch griditem">
		<a href="https://provo.edu/search-results/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/dark/search-loupe.svg" width="25px"></a>
		<!-- <a><img src="https://sandbox.provo.edu:8443/wp-content/themes/pcsdtwentysixteen/assets/icons/light/translation-light.png" width="25px"></a>	
			 -->
			<!-- <form id="cludo-search-form" role="search">
				<input type="search" class="search-input" aria-label="Search" placeholder="Search This Website...">
				<button type="submit" class="search-button" id="search-button">Search</button>
			</form> -->
		</div>

	</header><!-- end mainHeader -->