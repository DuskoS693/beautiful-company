<?php
/**
 * Template Name: Join Us Template
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
			<?php query_posts(array(
				'post_type' => 'jobs',
				'post__in' => get_field('select_job'),
				'posts_per_page' => -1
			)); ?>
			<?php if ( have_posts() ) : ?>
			<div class="content-sidebar" id="sidebar-main">
				<a href="#" class="toggle-sidebar"><?php the_field('sidebar_title'); ?></a>
				<div class="sidebar-inner clearfix">
					<ul class="no-style has-content-sections">
                        <?php if( get_field('sidebar_title' ) ) : ?>
                            <li class="text-upper"><a href="#intro-section"><?php the_field('sidebar_title'); ?></a></li>
                        <?php endif; ?>
					<?php while(have_posts()) : the_post(); ?>
						<li><a href="#<?php echo sanitize_title( get_the_title() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
			<div class="content-wrap">
                <?php if( get_field('textbox_content' ) ) : ?>
				<div id="intro-section" class="entry">
					<?php the_field('textbox_content'); ?>
				</div>
                <?php endif; ?>
				<div class="line"></div>

				<?php query_posts(array(
					'post_type' => 'jobs',
					'post__in' => get_field('select_job'),
					'posts_per_page' => -1
				)); ?>
				<?php if ( have_posts() ) : ?>
				<?php while(have_posts()) : the_post(); ?>
				<div class="textbox content-part" id="<?php echo sanitize_title( get_the_title() ); ?>">
					<div class="entry">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-thin">Read More</a>
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
