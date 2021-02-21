<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nerdwave
 */

$featured_img_url = get_the_post_thumbnail_url( $post->ID, 'nerdwave-thubmanil' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a class="billboard-link" href="<?php the_permalink(); ?>" rel="bookmark">
        </a>

        <?php echo '<span class="entry-thumb" style="background-image: url(' . $featured_img_url . ')"></span>'; ?>

        <span class="overlay">
            <div class="entry-header">
                <?php
                nerdwave_cat_links();
                the_title( '<h2 class="entry-title">', '</h2>' ); ?>

                <div class="entry-meta">
                    <?php
                    nerdwave_posted_by();
                    nerdwave_posted_on();
                    ?>
                </div>
            </div>
        </span>
</article>

