<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>

	<?php endif; ?>

<?php get_footer();
