<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function pinto_customizer_css() {

	$background_color       = get_theme_mod( 'background_color', '#ffffff' );
	$theme_accent_color     = get_theme_mod( 'theme_accent_color', pinto_defaults( 'theme_accent_color' ) );
	$site_logo_width        = get_theme_mod( 'custom_logo_max_width', pinto_defaults( 'custom_logo_max_width' ) );
	$site_logo_mobile_width = get_theme_mod( 'custom_logo_mobile_max_width', pinto_defaults( 'custom_logo_mobile_max_width' ) );

	$css =
	'

	body .custom-logo-link img.custom-logo {
		width: ' . esc_attr( $site_logo_mobile_width ) . 'px;
	}

	@media (min-width: 600px) {
		body .custom-logo-link img.custom-logo {
			width: ' . esc_attr( $site_logo_width ) . 'px;
		}
	}

	body #theme-wrapper { background-color: #' . esc_attr( $background_color ) . '; }

	.has-accent-color { color: ' . esc_attr( $theme_accent_color ) . '; }

	.has-accent-background-color { background-color: ' . esc_attr( $theme_accent_color ) . '; }

	.cats,
	a:hover,
	p.copyright a:hover,
	.widget li a:hover,
	.entry-meta a:hover,
	.logged-in-as a:hover,
	.comment-meta a:hover,
	.comment-author a:hover,
	.comment-meta .author-tag a,
	.theme-tagline p a,
	span.required,
	.entry-meta-after a:hover,
	#header-container h1:hover,
	#header-container .main-menu a:hover,
	.bean-tabs > li.active > a,
	.bean-panel-heading p.bean-panel-title a:hover,
	.bean-panel-title > a:hover,
	.bean-tabs > li.active > a:hover,
	.entry-title a:hover,
	.bean-tabs > li.active > a:focus { color:' . esc_attr( $theme_accent_color ) . ' ; }

	.btn,
	.button,
	.tagcloud a,
	button.button,
	div.jp-play-bar,
	.pagination a:hover,
	.btn[type="submit"],
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.button[type="submit"],
	div.jp-volume-bar-value,
	.format-link .link-wrapper:hover,
	.widget_bean_cta .button.cta.attention,
	.widget_bean_recent_posts .post-thumb:hover .format-icon { background-color: ' . esc_attr( $theme_accent_color ) . '; }

	.btn:hover,
	li.skill-bar,
	.button:hover,
	.tagcloud a:hover,
	.testimonial-style,
	button.button:hover,
	.btn[type="submit"]:hover,
	input[type="reset"]:hover,
	section.post.format-quote,
	input[type="submit"]:hover,
	input[type="button"]:hover,
	.format-link .link-wrapper,
	.button[type="submit"]:hover,
	.widget_bean_cta .button.cta,
	.form-submit input[type="submit"]:hover { background-color: #2B2625; }

	.bean-quote, .featurearea_icon .icon { background-color: ' . esc_attr( $theme_accent_color ) . '!important; }
	';

	// Minify.
	if ( function_exists( 'themebeans_minify_css' ) ) {
		$css = themebeans_minify_css( $css );
	}

	return wp_strip_all_tags( $css );
}

/**
 * Enqueue the Customizer styles on the front-end.
 */
function pinto_customizer_styles() {
	wp_add_inline_style( 'pinto-style', pinto_customizer_css() );
}
add_action( 'wp_enqueue_scripts', 'pinto_customizer_styles' );
