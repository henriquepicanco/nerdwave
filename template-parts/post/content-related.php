<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nerdwave
 */

?>

<div class="col-12-sm col-4">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
      <div class="col-4-sm col-12">
        <div class="entry-media">
          <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
              the_post_thumbnail(
                'nerdwave_thumbnail_related',
                array(
                  'alt' => the_title_attribute(
                    array(
                      'echo' => false,
                    )
                  ),
                )
              );
            ?>
          </a>

          <?php nerdwave_cat_links(); ?>
        </div>
      </div>

      <div class="col-8-sm col-12">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
      </div>
    </div>
  </div>
</div>