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
									<h1 class="entry-title"><?php esc_html_e( 'Opa! Esta página não foi encontrada!', 'nerdwave' ); ?></h1>
								</header>
								<div class="entry-content">
									<p><?php esc_html_e( 'A página pela qual você busca, não foi encontrada neste endereço. Talvez o conteúdo tenha mudado de lugar, ou mesmo nunca tenha existido. Use a busca, no topo desta página. Ela pode te ajudar a encontrar o que procura.', 'nerdwave' ); ?></p>
								</div>
								<footer class="entry-footer">
									<span><a href="/"><?php esc_html_e( 'Voltar a página inicial', 'nerdwave' ); ?></a><span>
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
