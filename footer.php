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
		<div id="content" class="container">
			<div class="site-info">
				<p><?php get_template_part( 'template-parts/header/site-branding' ); ?></p>
				<p><?php get_template_part( 'template-parts/navigation/footer-navigation' ); ?></p>
				<p><?php echo nerdwave_copyright(); ?> <?php printf( esc_html__( '%1$s - Content under Creative Commons %2$s', 'nerdwave' ), get_bloginfo( 'name' ), '<a href="'. get_bloginfo( 'url' ) . '/creative-commons">('. esc_html__( 'Know more', 'nerdwave' ) . ')</a>' ); ?>
			</div><!-- .site-info -->
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
