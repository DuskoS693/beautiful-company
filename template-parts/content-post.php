<?php
/**
 * The template used for displaying content post
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */
?>
<!--
	<?php if ( get_field('blog_hero_background', 'options') ) : ?>
	<?php $hero_background = wp_get_attachment_image_src( get_field('blog_hero_background', 'options'), '1920x900' ); ?>
	<section class="hero bgr-style" style="background: url(<?php echo $hero_background[0]; ?>)">
	<?php else : ?>
	<section class="hero bgr-style">
	<?php endif; ?>
		<div class="container">
			<div class="hero-box">
				<?php if ( is_tag() ) : ?>
				<h1><em>Tag - <?php single_tag_title(); ?></em></h1>
				<?php elseif ( is_author() ) : ?>
				<h1><em>Author - <?php echo get_author_name(); ?></em></h1>
				<?php else : ?>
				<h1><em><?php the_field('blog_hero_headline', 'options'); ?></em></h1>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- end /.hero -->

	<section id="scroll-target">
		<div class="container">
            <!--
			<div class="content-sidebar">
				<?php pt_year_wise_monthly_archive(); ?>
			</div>
-->

			<div class="boxes-wrap blog-list">
               <div class="boxes">
				    <?php while(have_posts()) : the_post(); ?>
                    <div class="box">
                        <h2><em><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></em></h2>

                        <div class="content-box-inner clearfix">
                            <div class="content-box-image">
                                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, '340x160' ); ?>" alt="<?php thumbnail_alt_text(['post_id' => $post->ID, 'thumbnail_id' => get_post_thumbnail_id()]); ?>">
                            </div>
                            <div class="content-box-text">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php $posttags = get_the_tags(); ?>
                        <?php if ($posttags) : ?>
                       <!-- <ul class="content-tags no-style">
                        <?php foreach ( $posttags as $key => $tag ) : ?>
                            <?php if ( end( array_keys( $posttags ) ) == $key ) : ?>
                            <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?> &nbsp;</a> </li>
                            <?php else : ?>
                            <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?>,&nbsp;</a> </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </ul> -->
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-thin">Read More</a>
                    </div>
				<?php endwhile; ?>
               </div><!-- boxes -->
				<div class="pagination">
					<?php the_posts_pagination( array(
						'mid_size'  => 5,
						'prev_text' => '',
						'next_text' => '',
					) ); ?>
				</div>

			</div>
		</div>
	</section>
	<!-- end /.content -->
