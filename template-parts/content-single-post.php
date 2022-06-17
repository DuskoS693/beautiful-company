<?php
/**
 * The template used for displaying content single post
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
                <div  id="main-content-wrap">
				<div class="blog-page-sidebar" id="sidebar-blog">
					<div class="sidebar-inner clearfix">
						<div class="hide-mobile">
							<?php $category = get_the_category(); ?>
							<h2 class="text-upper"><?php echo $category[0]->name; ?></h2>
							<p>
								by <?php the_author_posts_link(); ?><br>
								<span><?php echo get_the_date(); ?></span>
							</p>
						</div>
						<?php $next_post = get_next_post(); ?>
						<?php if (!empty( $next_post )) : ?>
						<div class="show-mobile">
							<p><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><strong>Next: </strong><?php echo esc_attr( $next_post->post_title ); ?></a></p>
						</div>
						<?php else : ?>
							<?php $firstpost = get_posts(['numberposts' => 1, 'post_type' => 'post', 'order' => 'ASC']); ?>
							<?php if (!empty( $firstpost )) : ?>
							<div class="show-mobile">
								<p><a href="<?php echo esc_url( get_permalink( $firstpost[0]->ID ) ); ?>"><strong>Next: </strong><?php echo esc_attr( $firstpost[0]->post_title ); ?></a></p>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						<div class="share">
                                <a href="#" class="open-sharing">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_share.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_share@2x.png');?> 2x" alt="*">
                                    <span>share</span>
                                </a>
                            <div class="sharing-icons">
                                <a class="get-link" href="<?php the_permalink(); ?>">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_copy.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_copy@2x.png');?> 2x" alt="*">
                                    <span>Copy URL</span>
                                </a>
                                <a href="mailto:?body=%0D%0A<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_email.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_email@2x.png');?> 2x" alt="*">
                                    <span>Send email</span>
                                </a>
                                <a href="http://www.twitter.com/share?url=<?php the_permalink(); ?>" target="_blank">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_twitter.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_twitter@2x.png');?> 2x" alt="*">
                                    <span>Twitter</span>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_facebook.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_facebook@2x.png');?> 2x" alt="*">
                                    <span>Facebook</span>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank">
                                    <img srcset="<?php echo get_theme_file_uri('/assets/images/ico_linkedin.png');?> 1x, <?php echo get_theme_file_uri('/assets/images/ico_linkedin@2x.png');?> 2x" alt="*">
                                    <span>LinkedIn</span>
                                </a>
                            </div>

						</div>
					</div>
				</div>
				<div class="content-wrap">
					<div class="intro"><?php the_field('intro_text'); ?></div>
					<div class="entry"><?php the_content(); ?></div>
					<div class="tags">
						<?php $next_post = get_next_post(); ?>
						<?php if (!empty( $next_post )) : ?>
							<div class="tag-text">
								<h6>Next Post</h6>
								<p><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_attr( $next_post->post_title ); ?></a></p>
							</div>
						<?php else : ?>
							<?php $firstpost = get_posts(['numberposts' => 1, 'post_type' => 'post', 'order' => 'ASC']); ?>
							<?php if (!empty( $firstpost )) : ?>
							<div class="tag-text">
								<h6>Next Post</h6>
								<p><a href="<?php echo esc_url( get_permalink( $firstpost[0]->ID ) ); ?>"><?php echo esc_attr( $firstpost[0]->post_title ); ?></a></p>
							</div>
							<?php endif; ?>
						<?php endif; ?>

						<?php $posttags = get_the_tags(); ?>
						<?php if ($posttags) : ?>
						<div class="tag-links">
							<h6>Tags</h6>
							<div>
							<?php foreach ( $posttags as $key => $tag ) : ?>
								<?php if ( end( array_keys( $posttags ) ) == $key ) : ?>
								<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
								<?php else : ?>
								<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?>,</a>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
                </div>
			</div>
		</section>
		<!-- end /.content -->

	<?php endwhile; ?>
