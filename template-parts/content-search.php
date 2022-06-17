<?php
/**
 * The template used for displaying content search results
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */
?>

	<section class="hero bgr-style">
		<div class="container">
			<div class="hero-box">
				<?php if ( empty( $_GET['s'] ) ) : ?>
				<h1><em>Search: Empty</em></h1>
				<?php else : ?>
				<h1><em>Search: <?php echo get_search_query(); ?></em></h1>
				<?php endif ?>
			</div>
		</div>
	</section>
	<!-- end /.hero -->

	<?php if ( have_posts() &&  !empty( $_GET['s'] ) ) : ?>

		<section class="content" id="scroll-target">
			<div class="container">
				<div class="content-wrap">
					<?php while(have_posts()) : the_post(); ?>
					<div class="content-box">
						<h3><?php the_title(); ?></h3>
						<div class="content-box-inner clearfix">
							<div class="content-box-text">
								<?php the_excerpt(); ?>
							</div>
						</div>
						<a href="<?php the_permalink(); ?>" class="btn btn-thin">Read More</a>
					</div>
					<?php endwhile; ?>
					<div class="pagination">
						<?php the_posts_pagination( array(
							'mid_size'  => 5,
							'prev_text' => '&#60;',
							'next_text' => '&#62;',
						) ); ?>
					</div>
				</div>
			</div>
		</section>
		<!-- end /.content -->

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>
