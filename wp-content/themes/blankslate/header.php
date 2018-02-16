<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed">
		<header id="header" role="banner">

			<nav id="menu" role="navigation">
				<div class="nav-container">
					<div id="home-link">
					<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
				</div>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				<!-- <div id="search">
					<?php get_search_form(); ?>
				</div> -->
			</div>
		</nav>
	</header>
	<div id="container">