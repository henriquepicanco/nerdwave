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

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>