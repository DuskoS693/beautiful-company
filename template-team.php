<?php
/**
 * Template Name: Team Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<?php if ( get_field('hero_background') ) : ?>
	<?php $hero_background = wp_get_attachment_image_src( get_field('hero_background'), '1920x900' ); ?>
	<section class="hero bgr-style" style="background: url(<?php echo $hero_background[0]; ?>);">
	<?php else : ?>
	<section class="hero bgr-style">
	<?php endif; ?>
		<div class="container">
			<div class="hero-box">
				<h1><em><?php the_field('hero_headline'); ?></em></h1>
			</div>
		</div>
	</section>
	<!-- end /.hero -->

	<section class="content" id="scroll-target">
		<div class="container">
            <div  id="main-content-wrap">
			<div class="content-sidebar" id="sidebar-main">
				<a href="#" class="toggle-sidebar"><?php the_field('sidebar_title'); ?></a>
				<div class="sidebar-inner clearfix">
                    <?php if( get_field('sidebar_title' ) ) : ?>
                    <h2 class="text-upper"><?php the_field('sidebar_title'); ?></h2>
                    <?php endif; ?>
					<ul class="no-style has-content-sections">
						<li><a href="#<?php echo sanitize_title( get_field('textbox_headline') ); ?>" title="<?php the_field('textbox_title'); ?>"><?php the_field('textbox_title'); ?></a></li>
						<?php query_posts(array(
							'post_type' => 'team',
							'post__in' => get_field('team_users'),
							'posts_per_page' => -1
						)); ?>
						<?php if ( have_posts() ) : ?>
						<?php while(have_posts()) : the_post(); ?>
						<li><a href="#<?php echo sanitize_title( get_the_title() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
			</div>
			<div class="content-wrap">
				<div id="<?php echo sanitize_title( get_field('textbox_headline') ); ?>" class="content-part">
					<div class="entry">
						<h2><?php the_field('textbox_headline'); ?></h2>
						<?php the_field('textbox_content'); ?>
					</div>
				</div>
				<div class="content-btn">
					<a href="<?php the_field('textbox_button_link'); ?>" class="btn"><?php the_field('textbox_button_title'); ?></a>
				</div>
				<div class="line"></div>

				<?php query_posts(array(
					'post_type' => 'team',
					'post__in' => get_field('team_users'),
					'posts_per_page' => -1
				)); ?>
				<?php if ( have_posts() ) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<div class="textbox with-image content-part" id="<?php echo sanitize_title( get_the_title() ); ?>">
					<div class="inner clearfix">
						<div class="inner-right">
							<img src="<?php echo get_the_post_thumbnail_url( $post->ID, '160x160' ); ?>" alt="<?php thumbnail_alt_text(['post_id' => $post->ID, 'thumbnail_id' => get_post_thumbnail_id()]); ?>">
						</div>
						<div class="inner-left">
							<div class="entry">
								<h3><?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="btn btn-thin">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
            </div>
		</div>
	</section>
	<!-- end /.content -->

<?php get_footer();
