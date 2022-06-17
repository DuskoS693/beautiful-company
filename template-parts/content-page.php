<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */
?>

	<?php while(have_posts()) : the_post(); ?>

		<?php if ( has_post_thumbnail() ) : ?>
		<section class="hero bgr-style" style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, '1920x900' ); ?>)">
		<?php else : ?>
		<section class="hero bgr-style">
		<?php endif; ?>
			<div class="container">
				<div class="hero-box">
					<h1><em><?php the_title(); ?></em></h1>
				</div>
			</div>
		</section>
		<!-- end /.hero -->

		<section class="content" id="scroll-target">
			<div class="container">
				<div class="content-wrap">
					<div class="entry"><?php the_content(); ?></div>
				</div>
			</div>
		</section>
		<!-- end /.content -->

	<?php endwhile; ?>
