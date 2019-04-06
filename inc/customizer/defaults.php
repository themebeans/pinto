<?php
/**
 * Customizer defaults
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

/**
 * Get the default option for Pinto's Customizer settings.
 *
 * @param  string|string $name Option key name to get.
 * @return mixin
 */
function pinto_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'pinto_defaults', array(

				// Identity.
				'custom_logo_max_width'        => 50,
				'custom_logo_mobile_max_width' => 50,

				// Colors.
				'theme_accent_color'           => '#007c89',

				// Other options.
				'header_tagline'               => esc_html__( 'Welcome to Pinto, a nice new WordPress Theme by the ThemeBeans Crew, a developer team with a keen eye for exciting & unparalleled themes. Customize this tagline in the Theme Customizer, from your WordPress Dashboard.', 'pinto' ),
				'footer_tagline'               => esc_html__( 'You can find Rich on Twitter, Facebook & even on Dribbble. This is a footer tagline input added in via the Theme Customizer in Pinto.', 'pinto' ),
				'footer_copyright'             => '',
				'show_alternate_meta'          => true,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
