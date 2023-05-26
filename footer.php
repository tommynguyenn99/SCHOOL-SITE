<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school-site
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-contact">

		<nav id="footer-navigation" class="footer-navigation">
			<a href="<?php echo esc_url(__('https://docs.google.com/document/d/1OBz9bzBbeV8paIeXLqZOcoNKQpn0oK3SpHiaOeZQCtY/edit?usp=sharing/', 'fwd-school-theme')); ?>">
				<!-- Credits header  -->
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf(esc_html__('Photos Cited', 'fwd-school-theme'));
				?>
			</a>
			<?php wp_nav_menu(array('theme_location' => 'footer-left')); ?>
		</nav>
	</div>
	<!-- Created by  -->
	<div class="site-info">
		<a href="<?php echo esc_url( home_url( 'https://tommynguyen.ca/school/' ) ); ?>">
		<img src="path_to_your_logo_image" alt="Logo">
		</a>
		<?php esc_html_e('Created by ', 'fwd-school-theme'); ?><a href="<?php echo esc_url(__('https://tommynguyen.ca/', 'fwd-school-theme')); ?>"><?php esc_html_e('Tommy N & Brooke N', 'fwd-school-theme'); ?></a>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>