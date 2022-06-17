<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

	<?php endif; ?>

<?php get_footer();
