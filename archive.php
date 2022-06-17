<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( is_singular() ) : ?>

		<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

	<?php endif; ?>

<?php get_footer();
