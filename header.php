<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('/assets/images/favicon.png'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="bgr-overlay-search-body"></div>
	<div class="page-wrap">
		<header class="header">
			<div class="header-top">
				<a href="#" class="btn-change"></a>
				<a href="<?php bloginfo('url'); ?>" class="logo"></a>
				<div class="header-search clearfix">
					<div class="bgr-overlay"></div>
                    <div class="bgr-overlay-nav"></div>
					<a href="#" class="btn-search"></a>
					<form method="get" action="<?php bloginfo('url'); ?>" class="desktop-search">
						<input id="search-input" type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search" required>
                        <button class="close-icon" type="reset"></button>
						<button type="submit"></button>
					</form>
				</div>
			</div>
			<a href="#" class="btn-menu"><span></span></a>
			<div class="nav-main">
				<div class="mobile-search">
					<form method="get" action="<?php bloginfo('url'); ?>">
						<input id="search-input" type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search" required>
                        <button class="close-icon" type="reset"></button>
						<button type="submit"></button>
					</form>
				</div>
				<?php if (has_nav_menu('main')) :
					wp_nav_menu( array(
						'theme_location'	=> 'main',
						'menu_id'			=> false,
						'menu_class'		=> 'nav-menu no-style',
						'container'			=> false
					));
				endif; ?>
			</div>
		</header>
		<div class="top-space"></div>
