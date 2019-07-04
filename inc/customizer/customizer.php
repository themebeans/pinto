<?php
/**
 * Theme Customizer functionality
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function pinto_customize_register( $wp_customize ) {

	/**
	 * Customize.
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Remove Background Image support.
	$wp_customize->remove_section( 'background_image' );

	/**
	 * Add custom controls.
	 */
	require get_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-range-control.php' );

	/**
	 * Top-Level Customizer sections and panels.
	 */
	$wp_customize->add_section(
		'pinto_theme_options', array(
			'title'    => esc_html__( 'Theme Options', 'pinto' ),
			'priority' => 30,
		)
	);

	/**
	 * Add the site logo max-width options to the Site Identity section.
	 */
	$wp_customize->add_setting(
		'custom_logo_max_width', array(
			'default'           => pinto_defaults( 'custom_logo_max_width' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_max_width', array(
				'default'     => pinto_defaults( 'custom_logo_max_width' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Max Width', 'pinto' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 8,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 300,
					'step' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'custom_logo_mobile_max_width', array(
			'default'           => pinto_defaults( 'custom_logo_mobile_max_width' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new ThemeBeans_Range_Control(
			$wp_customize, 'custom_logo_mobile_max_width', array(
				'default'     => pinto_defaults( 'custom_logo_mobile_max_width' ),
				'type'        => 'themebeans-range',
				'label'       => esc_html__( 'Mobile Max Width', 'pinto' ),
				'description' => 'px',
				'section'     => 'title_tagline',
				'priority'    => 9,
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 200,
					'step' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'custom_logo_show_title', array(
			'default' => pinto_defaults( 'custom_logo_show_title' ),
		)
	);

	$wp_customize->add_control(
		'custom_logo_show_title', array(
			'label'   => esc_html__( 'Show title and logo together?', 'pinto' ),
			'section' => 'title_tagline',
			'type'    => 'checkbox',
		)
	);

	/**
	 * Theme Customizer options.
	 */
	$wp_customize->add_setting(
		'header_tagline', array(
			'default'   => pinto_defaults( 'header_tagline' ),
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_tagline', array(
			'label'   => esc_html__( 'Header Tagline', 'pinto' ),
			'section' => 'pinto_theme_options',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'footer_copyright', array(
			'default' => pinto_defaults( 'footer_copyright' ),
		)
	);

	$wp_customize->add_control(
		'footer_copyright', array(
			'label'   => esc_html__( 'Footer Copyright', 'pinto' ),
			'section' => 'pinto_theme_options',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'footer_tagline', array(
			'default' => pinto_defaults( 'footer_tagline' ),
		)
	);

	$wp_customize->add_control(
		'footer_tagline', array(
			'label'   => esc_html__( 'Footer Tagline', 'pinto' ),
			'section' => 'pinto_theme_options',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'show_alternate_meta', array(
			'default' => pinto_defaults( 'show_alternate_meta' ),
		)
	);

	$wp_customize->add_control(
		'show_alternate_meta', array(
			'label'   => esc_html__( 'Display Post Meta', 'pinto' ),
			'section' => 'pinto_theme_options',
			'type'    => 'checkbox',
		)
	);

	/**
	 * Colors.
	 */
	$wp_customize->add_setting(
		'theme_accent_color', array(
			'default' => pinto_defaults( 'theme_accent_color' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'theme_accent_color', array(
				'label'    => esc_html__( 'Accent Color', 'pinto' ),
				'section'  => 'colors',
				'settings' => 'theme_accent_color',
			)
		)
	);

	// Transports.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'footer_copyright' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_tagline' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'footer_tagline' )->transport   = 'postMessage';
}
add_action( 'customize_register', 'pinto_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function pinto_customize_preview_js() {
	wp_enqueue_script( 'pinto-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . PINTO_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'pinto_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function pinto_customize_controls_js() {
	wp_enqueue_script( 'pinto-customize-controls', get_theme_file_uri( '/assets/js/admin/customize-controls' . PINTO_ASSET_SUFFIX . '.js' ), array( 'customize-controls' ), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'pinto_customize_controls_js' );
