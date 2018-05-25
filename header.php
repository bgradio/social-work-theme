<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo get_page_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <!-- OneTrust Cookies Consent Notice (Production CDN, illinois.edu, en-GB) start -->
  <script src="https://cdn.cookielaw.org/consent/fd31c61a-15d6-4769-9802-5eafcc1098ba.js" type="text/javascript" charset="UTF-8"></script>
  <script type="text/javascript">
    function OptanonWrapper() { }
  </script>
  <!-- OneTrust Cookies Consent Notice (Production CDN, illinois.edu, en-GB) end -->

  <?php wp_head(); ?>
</head>
<body <?php (is_front_page()) ? body_class() : body_class('inner'); ?>>
	<div class="ssw-container">
		<header class="main" role="banner">
			<div class="top">
				<div class="wrap">
					<a class="menu-toggle" href="#"></a>
					<div class="mobile-wrap">
						<div class="search" role="search">
							<img src="<?php bloginfo('template_url'); ?>/img/search-icon.png" width="17" height="17" alt="Click to search" role="button">
							<div class="input-container">
								<?php get_search_form(); ?>
							</div>
						</div>
						<nav role="navigation" id="eyebrow" aria-label="eyebrow-menu">
							<?php
								if (has_nav_menu('top-menu')) {
									wp_nav_menu(array('theme_location'  => 'top-menu'));
								}
							?>
						</nav>
					</div>
				</div>
			</div>
			<div class="logo-banner">
				<div class="wrap">
					<?php if (is_front_page()): ?>
						<h1 class="visuallyhidden"><?php bloginfo('name'); ?></h1>
					<?php else: ?>
						<p class="visuallyhidden"><?php bloginfo('name'); ?></p>
					<?php endif; ?>
					<p class="logo"><a href="<?php bloginfo('url'); ?>">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="UIUC School of Social Work logo">
					</a></p>
					<a class="ir i-logo" href="http://illinois.edu">University of Illinois main site</a>
				</div>
			</div>
			<div class="main-menu">
				<div class="wrap">
					<a class="menu-toggle" href="#">Menu</a>
					<nav id="menu" role="navigation" aria-label="main-menu">
						<?php 
							if (has_nav_menu('main-menu')) {
								wp_nav_menu(array('theme_location'  => 'main-menu', 'depth' => 2)); 
							}
						?>
					</nav>
				</div>
			</div>
		</header>
