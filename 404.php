<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

				<header class="entry-header">					
					<h1 class="entry-title"><?php esc_html_e( 'Ops! This page was not found!', 'nerdwave' ); ?></h1>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
	
	<div id="content" class="container">
		<div class="row">
			<div class="col-sm-12 col-8">
				<div class="content-area">
					<main id="primary" class="site-main">
						<article class="post-404">
							<div class="entry-content">
								<p><?php esc_html_e( 'The page you are looking for was not found at this address. Perhaps the content has moved, or even never existed. Use the search at the top of this page. It can help you find what you are looking for.', 'nerdwave' ); ?></p>
							</div>
							<footer class="entry-footer">
								<span><a href="/"><?php esc_html_e( 'Back to Homepage', 'nerdwave' ); ?></a><span>
							</footer>
						</article>
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