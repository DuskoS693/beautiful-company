<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */
?>

	<?php query_posts(array(
		'post_type' => 'post',
		'tag__in' => get_field('articles_tag'),
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 5
	)); ?>
	<?php if ( have_posts() ) : ?>
	<div class="line"></div>
    <?php if( get_field('articles_headline' ) ) : ?>
	    <h2 id="articles-section"><?php the_field('articles_headline'); ?></h2>
    <?php endif; ?>
	<div class="content-slider-wrap">
		<div class="content-slider">
		<?php while(have_posts()) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="slideshow bgr-style" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, '340x160' ); ?>);">
			<?php else : ?>
			<div class="slideshow bgr-style">
			<?php endif; ?>
				<div class="slideshow-inner">
					<a href="<?php the_permalink(); ?>">
						<h4 class="text-upper"><em><?php the_title(); ?></em></h4>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<div class="content-slider-arrows">
			<div class="but-prev"></div>
			<div class="but-next"></div>
		</div>
	</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
