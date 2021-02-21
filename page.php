<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nerdwave
 */

get_header();
?>

<div class="site-content">
	<div id="content" class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
					<?php if( function_exists( 'bcn_display' ) ) :
						bcn_display();
					endif; ?>
				</div>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">
			<div class="col-12-sm col-8">
				<div class="content-area">
					<main id="primary" class="site-main">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/page/content-page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div>
			</div>

			<div class="col-12-sm col-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();

