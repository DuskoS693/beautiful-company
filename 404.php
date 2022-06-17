<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<section class="hero bgr-style">
		<div class="container">
			<div class="hero-box">
				<h1><em>Error 404 - Page not found!</em></h1>
			</div>
		</div>
	</section>
	<!-- end /.hero -->

	<section class="content">
		<div class="container">
			<div class="content-wrap">
				<div class="entry">
					<p>The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- end /.content -->

<?php get_footer();
