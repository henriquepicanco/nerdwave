<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nerdwave
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php nerdwave_post_thumbnail(); ?>
	
	<div class="entry-meta">
		<?php
		nerdwave_avatar_by();
		nerdwave_posted_by();
		nerdwave_comments_link();
		?>
	</div>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nerdwave' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nerdwave' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nerdwave_tags_links(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
