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
        <a class="billboard-link" href="<?php the_permalink(); ?>" rel="bookmark">
        </a>

        <div class="entry-media">
            <?php
                the_post_thumbnail(
                    'nerdwave_thumbnail',
                        array(
                            'alt' => the_title_attribute(
                                array(
                                    'echo' => false,
                                )
                            ),
                        )
                );
            ?>
        </div>

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

