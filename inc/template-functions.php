<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nerdwave
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nerdwave_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( is_singular() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'nerdwave_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nerdwave_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nerdwave_pingback_header' );

/**
 * Copyright automático
 * 
 * Este pequeno tweak irá printar, aonde for colocada, um símbolo de
 * copyright, junto com o ano do primeiro post do site e o ano corrente.
 * 
 * @package Nerdwave
 */
function nerdwave_copyright() {
	global $wpdb;

	$copyright_dates = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish' ");

	$output = '';

	if( $copyright_dates ) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;

		if( $copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}

		$output = $copyright;
	}

	return $output;
}

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since nerdwave 1.0
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function nerdwave_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}