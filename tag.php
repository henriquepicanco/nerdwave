<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nerdwave
 */

if ( is_home() ) :

	$query_posts = new WP_Query( array(
		'posts_per_page' => 7,
		'offset' => 3,
	) );

endif;

if ( is_category() ) :

	$current_cat = get_the_category();
	$cat_ID = $current_cat[0]->cat_ID;

	$query_posts = new WP_Query( array(
		'posts_per_page' => 7,
		'offset' => 3,
		'cat' => $cat_ID,
	) );

endif;

get_header();
?>

<div class="site-content">
	<div id="header" class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
					<?php if( function_exists( 'bcn_display' ) ) :
						bcn_display();
					endif; ?>
				</div>
				
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header>
			</div>
		</div>
	</div>

	<?php get_template_part( 'template-parts/content/billboard' ); ?>

	<div id="content" class="container">
		<div class="row">
			<div class="col-12-sm col-8">
				<div class="content-area">
					<main id="primary" class="site-main">

						<?php
						if ( $query_posts->have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
								<?php
							endif;
							?>

							<div class="site-main-inner">
								<?php
								/* Start the Loop */
								while ( $query_posts->have_posts() ) :
									$query_posts->the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/post/content-archive' );

								endwhile;
								?>
							</div>

							<?php
							the_posts_pagination(
								array(
									'prev_text'          => nerdwave_get_theme_svg( 'arrow-left' ) . '<span class="screen-reader-text">' . __( 'Previous page', 'nerdwave' ) . '</span>',
									'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'nerdwave' ) . '</span>' . nerdwave_get_theme_svg( 'arrow-right' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'nerdwave' ) . ' </span>',
								)
							);

							printf( '<div class="load-more-posts"><button class="load-more">%1$s</button></div>', esc_html__( 'Load more', 'nerdwave' ) );

						endif;
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
