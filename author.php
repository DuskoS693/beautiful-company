<?php
/**
 * The template for displaying Author
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php get_template_part( 'template-parts/content', 'post' ); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content-page', 'none' ); ?>

	<?php endif; ?>

<?php get_footer();
