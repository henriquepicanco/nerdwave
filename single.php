<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nerdwave
 */

get_header();
?>

<div class="site-content">
	<div id="content" class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
				endif;
				?>
				
				<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">					
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-info">
						<?php
						nerdwave_posted_on();
						nerdwave_reading_time();
						?>
					</div>
				</header><!-- .entry-header -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">
			<div class="col-sm-12 col-8">
				<div class="content-area">
					<main id="primary" class="site-main">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/post/content-single' );

							get_template_part( 'template-parts/content/related-posts' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div>
			</div>

			<div class="col-sm-12 col-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
