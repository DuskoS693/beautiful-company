<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Beautiful_Company
 * @since 1.0
 * @version 1.0
 */

?>

	<footer class="footer">
		<div class="footer-inner text-center">

			<?php if (has_nav_menu('main')) :
				wp_nav_menu( array(
					'theme_location'	=> 'main',
					'menu_id'			=> false,
					'menu_class'		=> 'footer-mobile-menu no-style',
					'container'			=> false
				));
			endif; ?>


			<!--<h6>&copy; <?php date('Y'); ?> :: <a href="<?php bloginfo('url'); ?>">Beautiful Company</a> ::
				<a href="<?php the_field('footer_1_link', 'options'); ?>"><?php the_field('footer_1_title_link', 'options'); ?></a> ::
				<a href="<?php the_field('footer_2_link', 'options'); ?>"><?php the_field('footer_2_title_link', 'options'); ?></a></h6> -->

			<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>

			<div class="footer-copyright">&copy; <?php date('Y'); ?> Beautiful Company<br/>
				<strong><a href="<?php the_field('footer_1_link', 'options'); ?>"><?php the_field('footer_1_title_link', 'options'); ?></a> | <a href="<?php the_field('footer_2_link', 'options'); ?>"><?php the_field('footer_2_title_link', 'options'); ?></a></strong>
			</div>
            <a href="#" class="back-to-top"></a>
		</div>
	</footer>
</div>
<!-- end /.page-wrap -->

<?php wp_footer(); ?>

</body>
</html>
