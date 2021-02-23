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

$current_page = get_query_var('paged');
$current_page = max( 1, $current_page );

$per_page = 7;
$offset_start = 3;
$offset = ( $current_page - 1 ) * $per_page + $offset_start;

$query_posts = new WP_Query(array(
    'posts_per_page' => $per_page,
    'paged'          => $current_page,
    'offset'         => $offset, // Starts with the second most recent post.
    'orderby'        => 'date',  // Makes sure the posts are sorted by date.
    'order'          => 'DESC',  // And that the most recent ones come first.
));

// Manually count the number of pages, because we used a custom OFFSET (i.e.
// other than 0), so we can't simply use $query_posts->max_num_pages or even
// $query_posts->found_posts without extra work/calculation.
$total_rows = max( 0, $query_posts->found_posts - $offset_start );
$total_pages = ceil( $total_rows / $per_page );

get_header();
?>

<div class="site-content">
	<?php get_template_part( 'template-parts/content/billboard' ); ?>

	<div id="content" class="container">
		<div class="row">
			<div class="col-sm-12 col-8">
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
						wp_reset_postdata();
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
