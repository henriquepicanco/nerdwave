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

get_header();
?>

<div class="site-content">
	<div id="header" class="container">
		<div class="row">
			<div class="col-12">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
				endif;
				?>
				
				<header class="page-header">
                    <span class="algolia-search">
                        <?php echo nerdwave_get_theme_svg( 'algolia' ); ?>
                    </span>
                    <h1 class="page-title">
                        <?php echo get_search_query();?>
                    </h1>
				</header>
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">
			<div class="col-sm-12 col-8">
				<div class="content-area">
					<main id="primary" class="site-main">

						<?php
						if ( have_posts() ) :

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
								while ( have_posts() ) :
									the_post();

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

						else :

							get_template_part( 'template-parts/post/content-none' );

						endif;
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
