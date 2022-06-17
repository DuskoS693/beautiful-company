<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<section class="hero hero-home bgr-style">
		<div class="container">
			<div class="hero-box">
				<h5 class="text-upper"><?php the_field('hero_title'); ?></h5>
				<h1><em><?php the_field('hero_headline'); ?></em></h1>
				<?php the_field('hero_description'); ?>
				<?php if ( get_field('hero_button_link') && get_field('hero_button_title') ) : ?>
				<a href="<?php the_field('hero_button_link'); ?>" class="btn btn-thin"><?php the_field('hero_button_title'); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- end /.hero -->

	<section class="boxes-wrap">
		<div class="container">
			<?php if( have_rows('text_boxes' ) ) : ?>
			<div class="full-width-boxes">
				<?php while ( have_rows('text_boxes' ) ) : the_row(); ?>
				<div class="box">
					<h5 class="text-upper"><?php the_sub_field('title'); ?></h5>
					<h2 class="text-upper"><?php the_sub_field('headline'); ?><span class="dot">.</span></h2>
					<?php the_sub_field('description'); ?>
					<a href="<?php the_sub_field('button_link'); ?>" class="btn btn-thin"><?php the_sub_field('button_title'); ?></a>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<!-- end /.boxes-wrap -->

<?php get_footer();
