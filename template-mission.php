<?php
/**
 * Template Name: Mission Template
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


					<ul class="no-style has-content-sections">
                        <?php if( get_field('sidebar_title' ) ) : ?>
                            <li class="text-upper"><a href="#intro-section"><?php the_field('sidebar_title'); ?></a></li>
                        <?php endif; ?>
                        <?php if( get_field('intro_headline' ) ) : ?>
                            <li class="text-upper"><a href="#intro-section-two"><?php the_field('intro_headline'); ?></a></li>
                        <?php endif; ?>
						<?php if( have_rows('text_items' ) ) : ?>
						<?php while ( have_rows('text_items' ) ) : the_row(); ?>
						<li><a href="#<?php echo sanitize_title( get_sub_field('headline') ); ?>" title="<?php the_sub_field('headline'); ?>"><?php the_sub_field('headline'); ?></a></li>
						<?php endwhile; ?>
						<?php endif; ?>
                        <?php if( get_field('articles_headline' ) ) : ?>
                            <li class="text-upper"><a href="#articles-section""><?php the_field('articles_headline'); ?></a></li>
                        <?php endif; ?>
					</ul>

				</div>
			</div>

			<div class="content-wrap mission-wrap">
                <?php if( get_field('intro_description' ) ) : ?>
                    <div id="intro-section" class="intro"><?php the_field('intro_description'); ?></div>
                <?php endif; ?>

				<div class="content-btn"><a href="<?php the_field('intro_button_link'); ?>" class="btn"><?php the_field('intro_button_title'); ?></a></div>
				<div class="line"></div>

                <?php if( get_field('intro_headline' ) ) : ?>
                    <h2 id="intro-section-two"><?php the_field('intro_headline'); ?></h2>
                <?php endif; ?>
				<?php the_field('intro_text'); ?>

				<?php if( have_rows('text_items' ) ) : ?>
				<?php while ( have_rows('text_items' ) ) : the_row(); ?>
				<div class="textbox with-image content-part" id="<?php echo sanitize_title( get_sub_field('headline') ); ?>">
					<div class="inner clearfix">
						<?php if ( get_sub_field('image') ) : ?>
						<?php $image = wp_get_attachment_image_src( get_sub_field('image'), '160x160' ); ?>
						<div class="inner-right">
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
						<?php endif; ?>
						<div class="inner-left">
							<div class="entry">
								<h4><?php the_sub_field('headline'); ?></h4>
								<?php the_sub_field('content'); ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/include-articles-related'); ?>

			</div>
		</div>
        </div>
	</section>
	<!-- end /.content -->

<?php get_footer();
