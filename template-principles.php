<?php
/**
 * Template Name: Principles Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	
	<?php if( have_rows('hero_items' ) ) : ?>
	<section class="hero with-slider bgr-style">
		<div class="container">
			<div class="hero-slider-wrap">
				<div class="hero-slider">
				<?php while ( have_rows('hero_items' ) ) : the_row(); ?>
					<div class="slideshow">
						<h3 class="text-upper"><em><?php the_sub_field('headline'); ?></em></h3>
						<?php the_sub_field('description'); ?>
						<a href="<?php the_sub_field('button_link'); ?>" class="btn btn-thin smooth-scroll-btn">Read More</a>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- end /.hero -->
	<?php endif; ?>

	<section class="content" id="scroll-target">
		<div class="container container-wrap">
            <div id="main-content-wrap">
			<div class="content-sidebar" id="sidebar-main">
				<a href="#" class="toggle-sidebar"><?php the_field('sidebar_title'); ?></a>
				<div class="sidebar-inner clearfix">

					<ul class="no-style has-content-sections">
                        <?php if( get_field('sidebar_title' ) ) : ?>
                            <li class="text-upper"><a href="#intro-section"><?php the_field('sidebar_title'); ?></a></li>
                        <?php endif; ?>
					<?php if( have_rows('textbox_items' ) ) : ?>
					<?php while ( have_rows('textbox_items' ) ) : the_row(); ?>
						<li><a href="#<?php echo sanitize_title( get_sub_field('headline') ); ?>" title="<?php the_sub_field('headline'); ?>"><?php the_sub_field('headline'); ?></a></li>
					<?php endwhile; ?>
					<?php endif; ?>
                        <?php if( get_field('articles_headline' ) ) : ?>
                            <li class="text-upper"><a href="#articles-section"><?php the_field('articles_headline'); ?></a></li>
                        <?php endif; ?>
					</ul>

				</div>
			</div>

			<div class="content-wrap">
				<?php if( get_field('intro_text' ) ) : ?>
                    <div id="intro-section" class="intro">
					<?php the_field('intro_text'); ?>
                    </div>
				<?php endif; ?>

				<?php if( have_rows('after_intro_text' ) ) : ?>
				<?php while ( have_rows('after_intro_text' ) ) : the_row(); ?>
				<div class="content-part">
					<div class="entry">
						<?php the_sub_field('text'); ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php if( have_rows('textbox_items' ) ) : ?>
				<?php while ( have_rows('textbox_items' ) ) : the_row(); ?>
				<div id="<?php echo sanitize_title( get_sub_field('headline') ); ?>" class="content-part">
					<div class="entry">
						<h4><?php the_sub_field('headline'); ?></h4>
						<?php the_sub_field('content'); ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/include-articles-related' ); ?>

			</div>
            </div>
		</div>
	</section>
	<!-- end /.content -->

<?php get_footer();
