<?php
/**
 * Microformats v2 support.
 *
 * Filters different classes in order to add support for Microformats.
 *
 * @link http://microformats.org/wiki/microformats
 * @link http://microformats.org/wiki/microformats2
 * @link http://schema.org
 * @link http://indiewebcamp.com
 *
 * @package Pinto
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes List of classes added to <body> tag.
 * @return array New list of classes with microformats.
 */
function pinto_mf_body_classes( $classes ) {
	if ( ! is_singular() && ! is_404() ) {
		$classes[] = 'h-feed';
	} else {
		$classes[] = 'h-entry';
	}

	return $classes;
}
add_filter( 'body_class', 'pinto_mf_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes List of classes added to <article> tag.
 * @return array New list of classes with microformats.
 */
function pinto_mf_post_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'h-entry';
	}

	return $classes;
}
add_filter( 'post_class', 'pinto_mf_post_classes', 99 );

/**
 * Add microformats class to main content, which uses excerpt or content.
 *
 * @return string Content class to use.
 */
function pinto_content_class() {
	$content_class = 'entry-content';
	if ( is_singular() ) {
		$content_class .= ' e-content';
	} else {
		$content_class .= ' p-summary';
	}

	return $content_class;
}

/**
 * Adds custom classes to the array of comment classes.
 *
 * @param array $classes List of classes added to <article> tag.
 * @return array New list of classes with microformats.
 */
function pinto_mf_comment_classes( $classes ) {
	$classes[] = 'h-cite';
	$classes[] = 'p-comment';

	return array_unique( $classes );
}
add_filter( 'comment_class', 'pinto_mf_comment_classes', 99 );

/**
 * Adds microformats v2 support to the comment_author_link.
 *
 * Specifically injects u-url to point to a comment URL.
 *
 * @param string $link Link from comment.
 * @return string Link with the u-url attribute added.
 */
function pinto_mf_filter_comment_link( $link ) {
	return preg_replace( '/(class\s*=\s*[\"|\'])/i', '${1}u-url ', $link );
}
add_filter( 'get_comment_author_link', 'pinto_mf_filter_comment_link' );

/**
 * Adds microformats v2 support to the get_avatar() method.
 *
 * @param array $args Full list of arguments passed to the avatar, including CSS classes.
 * @return array New attributes, with the right class added.
 */
function pinto_mf_avatar_data( $args ) {
	if ( ! isset( $args['class'] ) ) {
		$args['class'] = array();
	}

	// Adds a class for microformats v2.
	$args['class'] = array_unique( array_merge( $args['class'], array( 'u-photo' ) ) );

	return $args;
}
add_filter( 'pre_get_avatar_data', 'pinto_mf_avatar_data', 99, 1 );
