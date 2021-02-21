<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Nerdwave
 */

if ( ! function_exists( 'nerdwave_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function nerdwave_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		if( is_singular() ) {
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( '%s', 'post date', 'nerdwave' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		} else {
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( '%s', 'post date', 'nerdwave' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		}

		echo '<span class="posted-on"> ' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'nerdwave_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function nerdwave_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'nerdwave' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'nerdwave_avatar_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function nerdwave_avatar_by() {
		$avatar = get_avatar( get_the_author_meta( 'user_email' ), $size = '36' );

		echo '<span class="author-avatar"> ' . $avatar . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'nerdwave_comments_link' ) ) :
	/**
	 * Prints HTML link for comments
	 */
	function nerdwave_comments_link() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'No comments<span class="screen-reader-text"> on %s</span>', 'nerdwave' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'nerdwave_edit_link' ) ) :
	/**
	 * Prints HTML link for comments
	 */
	function nerdwave_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Editar <span class="screen-reader-text">%s</span>', 'nerdwave' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'nerdwave_cat_links' ) ) :
	/**
	 * Prints HTML links for categories
	 */
	function nerdwave_cat_links() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'nerdwave' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="cat-links">' . esc_html__( '%1$s', 'nerdwave' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'nerdwave_tags_links' ) ) :
	/**
	 * Prints HTML links for tags
	 */
	function nerdwave_tags_links() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'nerdwave' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'nerdwave' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'nerdwave_reading_time' ) ) :
	/**
	 * Prints reading time
	 */
	function nerdwave_reading_time() {
		global $post; 
		
		$content = get_post_field( 'post_content', $post->ID );
		$word_count = str_word_count( strip_tags( $content ) );
		$readingtime = ceil($word_count / 200);

		if ($readingtime == 1) {
			$timer = esc_html( ' minute reading', 'nerdwave' );
		} else {
			$timer = esc_html( ' minutes of reading', 'nerdwave' );
		}
		
		$totalreadingtime = $readingtime . $timer;

		echo '<span class="reading-time">' . $totalreadingtime . '</span>';
	}
endif;

if ( ! function_exists( 'nerdwave_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function nerdwave_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="entry-media">
				<?php the_post_thumbnail( 'nerdwave_thumbnail' ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<div class="entry-media">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
						the_post_thumbnail(
							'nerdwave_thumbnail_archive',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
							)
						);
					?>
				</a>

				<?php nerdwave_cat_links(); ?>
			</div>

			<?php
		endif; // End is_singular().
	}
endif;


/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function nerdwave_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = nerdwave_SVG_Icons::get_social_link_svg( $item->url );
		if ( empty( $svg ) ) {
			$svg = nerdwave_get_theme_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'nerdwave_nav_menu_social_icons', 10, 4 );