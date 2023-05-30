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
			<!-- Credits header  -->
			<a href="<?php echo esc_url(home_url('https://tommynguyen.ca/school/')); ?>">
				<img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/logo/iconmonstr-idea-8-240.png" alt="Logo">
			</a>
			<?php wp_nav_menu(array('theme_location' => 'footer-left')); ?>
		</nav>
	</div>
	<!-- Created by  -->
	<div class="site-info">
		<?php esc_html_e('Created by ', 'fwd-school-theme'); ?><a href="<?php echo esc_url(__('https://tommynguyen.ca/', 'fwd-school-theme')); ?>"><?php esc_html_e('Tommy N & Brooke N', 'fwd-school-theme'); ?></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>