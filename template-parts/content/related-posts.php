<?php
/**
 * Blog Template Part for displaying single blog related posts
 *
 * @package Thype
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */


$the_query = nerdwave_get_related_posts( get_the_ID(), 4 );
global $cl_from_element;
$cl_from_element['is_related'] = true;						
// Display posts
if ( $the_query->have_posts() ) : 

?>
<div class="related-posts">
    <h2 class="widget-title">
        <?php echo esc_attr__( 'Posts Relacionados', 'nerdwave' ) ?>
    </h2>

    <div class="row">
      <?php $i = 0;
        while ( $the_query->have_posts() ) : $the_query->the_post();
        
        if( has_post_thumbnail() ){
          get_template_part( 'template-parts/post/content-related' );
          $i++;
        }
          
        if( $i == 3 )
          break;

        endwhile;
      ?>
    </div>
</div>

<?php endif; 
wp_reset_query();
$cl_from_element['is_related'] = false;
?>