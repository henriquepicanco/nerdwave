<?php

$inc = 1;
$featured_posts = new WP_Query( array(
	'posts_per_page' => 3,
) );

if ( ! is_paged() ) : ?>
	<div id="billboard" class="container">
		<div class="row">
			<?php
			if ( $featured_posts->have_posts() ) :
				while ( $featured_posts->have_posts() ) :
					$featured_posts->the_post();

					if ( $inc == 1 ) :
					?>

					<div class="col-sm-12 col-6">
						<?php get_template_part( 'template-parts/post/content-featured' ); ?>
					</div>

					<?php else : ?>

					<div class="col-sm-12 col-3">
						<?php get_template_part( 'template-parts/post/content-featured' ); ?>
					</div>
					
					<?php
					endif;
					$inc++;
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
<?php endif; ?>