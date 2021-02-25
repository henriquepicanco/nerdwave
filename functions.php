<?php
/**
 * nerdwave functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nerdwave
 */

if ( ! defined( 'NERDWAVE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NERDWAVE_VERSION', '1.0.12' );
}

if ( ! function_exists( 'nerdwave_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 * 
	 * @since nerdwave 1.0
	 */
	function nerdwave_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nerdwave, use a find and replace
		 * to change 'nerdwave' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nerdwave', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// For the archive pages
		add_image_size( 'nerdwave_thumbnail', 696, 0, true );

		// For the previous and next posts links
		add_image_size( 'nerdwave_thumbnail_archive', 350, 250, true );

		// For the previous and next posts links
		add_image_size( 'nerdwave_thumbnail_related', 218, 150, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main' => esc_html__( 'Primary', 'nerdwave' ),
				'social' => esc_html__( 'Social', 'nerdwave' ),
				'footer' => esc_html__( 'Footer', 'nerdwave' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'nerdwave_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add responsive embeds
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		add_theme_support( 'dark-editor-style' );

		// Enqueue editor styles.
		add_editor_style( array( 'assets/css/editor-style.min.css', nerdwave_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'nerdwave_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @since nerdwave 1.0
 *
 * @global int $content_width
 */
function nerdwave_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nerdwave_content_width', 680 );
}
add_action( 'after_setup_theme', 'nerdwave_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * @since nerdwave 1.0
 */
function nerdwave_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nerdwave' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nerdwave' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nerdwave_widgets_init' );

if ( ! function_exists( 'nerdwave_fonts_url' ) ) :
	/**
	 * Register Google fonts for Nerdwave.
	 *
	 * Create your own nerdwave_fonts_url() function to override in a child theme.
	 *
	 * @since Nerdwave 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function nerdwave_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Inter, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Inter font: on or off', 'nerdwave' ) ) {
			$fonts[] = 'Inter:400,400i,600,600i,700,700i';
		}
	
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}
	
		return $fonts_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 * 
 * @since nerdwave 1.0
 */
function nerdwave_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'nerdwave-fonts', nerdwave_fonts_url(), array(), null );

	wp_register_style( 'nerdwave-style', get_stylesheet_uri(), array(), NERDWAVE_VERSION );
	wp_add_inline_style( 'nerdwave-style', '' );

	wp_enqueue_style( 'nerdwave-style-min', get_template_directory_uri() . '/assets/css/style.min.css', NERDWAVE_VERSION );

	// Removing Gutenberg styles
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' );

	wp_enqueue_script( 'nerdwave-index', get_template_directory_uri() . '/assets/js/index.js', array(), NERDWAVE_VERSION, true );

	if ( ! is_singular() ) {
		wp_enqueue_script( 'nerdwave-infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.min.js', array(), '3.0.6', true );
	}

	// This javascript was deactivated, since Nerdwave uses Disqus to serve comments.
	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', 'nerdwave_scripts' );

/**
 * Removing Jetpack's CSS
 *
 * This theme does not use, nor does it allow, the Jetpack elements
 * in the frontend. Therefore, all the CSS used by Jetpack has been removed.
 *
 * @since nerdwave 1.0.12
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

/**
 * Changing archive headers
 * 
 * Displays a different output for page header at category pages.
 * 
 * @since nerdwave 1.0
 */
function nerdwave_prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'nerdwave_prefix_category_title' );

/**
 * Configuring Infinite-scroll.min.js.
 * 
 * This javascript will be loaded inline, at HTML, after full page loading.
 * 
 * @since nerdwave 1.0
 */
function nerdwave_infinite_scroll_ctrl() {
	if ( ! is_singular() ) { ?>
		<script>
			( function() {
				
				/**
				 * Infinite Scroll
				 */
				var elem = document.querySelector('.site-main-inner');
				if ( document.querySelector('.next') ) {
					var infScroll = new InfiniteScroll( elem, {
						// options
						path: '.next',
						append: 'article',
						hideNav: '.pagination',
						button: '.load-more',
						scrollThreshold: false,
					});
				}

			}());
		</script>
	<?php }
}
add_action( 'wp_footer', 'nerdwave_infinite_scroll_ctrl', 100 );

/**
 * Deactivate some plugins notifications for update
 * 
 * For a piece of peace at dashboard.
 * 
 * @since nerdwave 1.0
 */
function filter_plugin_updates( $value ) {
    unset( $value->response['admin-menu-editor-pro/menu-editor.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

/**
 * Get related posts at the entry content bottom.
 * 
 * Displays three posts related to the actual post.
 * 
 * @since nerdwave 1.0
 */
function nerdwave_get_related_posts( $post_id, $related_count, $args = array() ) {

	$terms = get_the_terms( $post_id, 'category' );

	if ( empty( $terms ) ) $terms = array();

	$term_list = wp_list_pluck( $terms, 'slug' );

	$related_args = array(
			'post_type' => 'post',
			'posts_per_page' => $related_count,
			'post_status' => 'publish',
			'post__not_in' => array( $post_id ),
			'orderby' => 'rand',
			'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);

	return new WP_Query( $related_args );
}

/**
 * Classes
 */
require get_template_directory() . '/inc/classes/class-svg-icons.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * SVG support
 */
require get_template_directory() . '/inc/svg-icons.php';