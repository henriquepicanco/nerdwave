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
    <div class="post-outer">
        <div class="post-inner">
            <?php
            nerdwave_post_thumbnail();
            ?>
        </div>

        <div class="post-inner">
            <header class="entry-header">
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            </header>
            
			<div class="entry-meta">
                <?php
                nerdwave_posted_by();
                nerdwave_posted_on();
                ?>
			</div>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</article>
