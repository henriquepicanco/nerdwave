<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nerdwave
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nerdwave' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="navbar-topbar">
			<div id="topbar" class="container">
				<div class="row">
					<div class="col-sm-4 col-4">
						<button class="menu-toggle mobile-menu-toggle show-sm" aria-controls="menu-modal" aria-expanded="false">
							<?php echo nerdwave_get_theme_svg( 'bars' ); ?>
							<span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'nerdwave' ); ?></span>
						</button>

						<?php get_template_part( 'template-parts/navigation/social-navigation' ); ?>
					</div>

					<div class="col-sm-4 col-4">
						<?php get_template_part( 'template-parts/header/site-branding' ); ?>
					</div>

					<div class="col-sm-4 col-4">
						<button class="search-toggle mobile-search-toggle show-sm" aria-controls="search-modal" aria-expanded="false">
							<?php echo nerdwave_get_theme_svg( 'search' ); ?>
							<span class="screen-reader-text"><?php esc_html_e( 'Open search', 'nerdwave' ); ?></span>
						</button>

						<div class="header-search-wrap hidden-sm">
							<button class="search-toggle desktop-search-toggle" aria-controls="search-modal" aria-expanded="false">
								<?php echo nerdwave_get_theme_svg( 'search' ); ?>
								<span class="screen-reader-text"><?php esc_html_e( 'Open search', 'nerdwave' ); ?></span>
							</button>

							<div class="header-search-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="navbar-bottombar">
			<div id="bottombar" class="container">
				<div class="row">
					<div class="col-sm-12 col-12">
						<?php get_template_part( 'template-parts/navigation/main-navigation' ); ?>
					</div>
				</div>
			</div>
		</div>
	</header>