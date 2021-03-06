<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nerdwave
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-12">
					<div class="site-info">
						<p><?php get_template_part( 'template-parts/header/site-branding' ); ?></p>
						<p><?php get_template_part( 'template-parts/navigation/footer-navigation' ); ?></p>
						<p><?php echo nerdwave_copyright(); ?> <?php printf( esc_html__( '%s - Content under Creative Commons', 'nerdwave' ), get_bloginfo( 'name' ) ); ?>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
get_template_part( 'template-parts/modal/menu-modal' );
get_template_part( 'template-parts/modal/search-modal' );
?>

<?php wp_footer(); ?>

</body>
</html>
