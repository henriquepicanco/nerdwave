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

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="page-content">
				<main class="site-main">
					<article class="post-404">
						<div class="post-outer">
							<div class="post-inner">
								<header class="entry-header">
									<h1 class="entry-title"><?php esc_html_e( 'Ops! This page was not found!', 'nerdwave' ); ?></h1>
								</header>
								<div class="entry-content">
									<p><?php esc_html_e( 'The page you are looking for was not found at this address. Perhaps the content has moved, or even never existed. Use the search at the top of this page. It can help you find what you are looking for.', 'nerdwave' ); ?></p>
								</div>
								<footer class="entry-footer">
									<span><a href="/"><?php esc_html_e( 'Back to Homepage', 'nerdwave' ); ?></a><span>
								</footer>
							</div>
						</div>
					</article>
				</main>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
