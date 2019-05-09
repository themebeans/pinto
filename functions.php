<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

if ( ! defined( 'PINTO_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'PINTO_DEBUG', true );
endif;

if ( ! defined( 'PINTO_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'PINTO_DEBUG' ) || true === PINTO_DEBUG ) {
		define( 'PINTO_ASSET_SUFFIX', null );
	} else {
		define( 'PINTO_ASSET_SUFFIX', '.min' );
	}
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pinto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tabor, use a find and replace
	 * to change 'pinto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pinto', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 140, 140 );
	add_image_size( 'thumbnail-large', 2000, 9999 );
	add_image_size( 'thumbnail-small', 250, 9999 );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Navigation', 'pinto' ),
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pinto_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'video',
		)
	);

	/*
	 * Switch default core taborup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for the WordPress default Theme Logo
	 * See: https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'flex-width' => true,
		)
	);

	/*
	 * Enable support for Customizer Selective Refresh.
	 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for responsive embedded content
	 * See: https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Custom colors for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
	 */
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Black', 'pinto' ),
				'slug'  => 'black',
				'color' => '#2a2a2a',
			),
			array(
				'name'  => esc_html__( 'Gray', 'pinto' ),
				'slug'  => 'gray',
				'color' => '#727477',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'pinto' ),
				'slug'  => 'light-gray',
				'color' => '#f8f8f8',
			),
			array(
				'name'  => esc_html__( 'White', 'pinto' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Titan White', 'pinto' ),
				'slug'  => 'titan-white',
				'color' => '#E0D8E2',
			),
			array(
				'name'  => esc_html__( 'Tropical Blue', 'pinto' ),
				'slug'  => 'tropical-blue',
				'color' => '#C5DCF3',
			),
			array(
				'name'  => esc_html__( 'Peppermint', 'pinto' ),
				'slug'  => 'peppermint',
				'color' => '#d0eac4',
			),
			array(
				'name'  => esc_html__( 'Iceberg', 'pinto' ),
				'slug'  => 'iceberg',
				'color' => '#D6EFEE',
			),
			array(
				'name'  => esc_html__( 'Bridesmaid', 'pinto' ),
				'slug'  => 'bridesmaid',
				'color' => '#FBE7DD',
			),
			array(
				'name'  => esc_html__( 'Pipi', 'pinto' ),
				'slug'  => 'pipi',
				'color' => '#fbf3d6',
			),
			array(
				'name'  => esc_html__( 'Accent', 'pinto' ),
				'slug'  => 'accent',
				'color' => esc_html( get_theme_mod( 'theme_accent_color', pinto_defaults( 'theme_accent_color' ) ) ),
			),
		)
	);

	/**
	 * Custom font sizes for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#block-font-sizes
	 */
	add_theme_support(
		'editor-font-sizes', array(
			array(
				'name'      => esc_html__( 'Small', 'pinto' ),
				'shortName' => esc_html__( 'S', 'pinto' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html__( 'Medium', 'pinto' ),
				'shortName' => esc_html__( 'M', 'pinto' ),
				'size'      => 19,
				'slug'      => 'medium',
			),
			array(
				'name'      => esc_html__( 'Large', 'pinto' ),
				'shortName' => esc_html__( 'L', 'pinto' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Huge', 'pinto' ),
				'shortName' => esc_html__( 'XL', 'pinto' ),
				'size'      => 30,
				'slug'      => 'huge',
			),
		)
	);

	// Add support for default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'assets/css/style-editor' . PINTO_ASSET_SUFFIX . '.css' );

	// Enqueue fonts in the editor.
	add_editor_style( pinto_fonts_url() );

}
add_action( 'after_setup_theme', 'pinto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pinto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pinto_content_width', 660 );
}
add_action( 'after_setup_theme', 'pinto_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pinto_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Hidden Sidebar', 'pinto' ),
			'id'            => 'internal-sidebar',
			'description'   => esc_html__( 'Widget area for the hidden sidebar.', 'pinto' ),
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title h4">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'pinto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pinto_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'pinto-fonts', pinto_fonts_url(), false, '@@pkg.version', 'all' );

	// Load theme styles.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'pinto-style', get_parent_theme_file_uri( '/style' . PINTO_ASSET_SUFFIX . '.css' ), false, '@@pkg.version' );
		wp_enqueue_style( 'pinto-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
	} else {
		wp_enqueue_style( 'pinto-style', get_theme_file_uri( '/style' . PINTO_ASSET_SUFFIX . '.css' ), false, '@@pkg.versio' );
	}

	/**
	 * Now let's check the same for the scripts.
	 */
	if ( SCRIPT_DEBUG || PINTO_DEBUG ) {

		// Vendor scripts.
		wp_enqueue_script( 'pinto-libraries', get_theme_file_uri( '/assets/js/vendors/custom-libraries.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'jquery.waypoints', get_theme_file_uri( '/assets/js/vendors/waypoints-sticky.min.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'jquery.superfish', get_theme_file_uri( '/assets/js/vendors/superfish.js' ), array( 'jquery' ), '@@pkg.version', true );

		// Custom script.
		wp_enqueue_script( 'pinto-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery' ), '@@pkg.version', true );

		$translation_handle = 'pinto-global'; // Variable for wp_localize_script.

	} else {
		wp_enqueue_script( 'pinto-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'pinto-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery' ), '@@pkg.version', true );

		$translation_handle = 'pinto-custom-min'; // Variable for wp_localize_script for minified javascript.
	}

	// Load the standard WordPress comments reply javascript.
	if ( is_singular( 'post' ) && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pinto_scripts' );

/**
 * Remove the duplicate stylesheet enqueue for older versions of the child theme.
 *
 * Since v3.0.0 Pinto has a built-in auto-loader for loading the appropriate
 * parent theme stylesheet, without the need for a wp_enqueue_scripts function within
 * the child theme. This means that stylesheets will "just work" and there's less chance
 * that users will accidently disrupt stylesheet loading.
 */
function pinto_remove_duplicate_child_parent_enqueue_scripts() {
	remove_action( 'wp_enqueue_scripts', 'pinto_child_scripts', 10 );
}
add_action( 'init', 'pinto_remove_duplicate_child_parent_enqueue_scripts' );

/**
 * Register custom fonts.
 */
function pinto_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Plex, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$plex = esc_html_x( 'on', 'Plex font: on or off', 'pinto' );

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by PT Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$pt_serif = esc_html_x( 'on', 'PT Serif font: on or off', 'pinto' );

	if ( 'off' !== $plex || 'off' !== $pt_serif ) {
		$font_families = array();

		if ( 'off' !== $plex ) {
			$font_families[] = 'IBM Plex Sans:400,700i';
		}

		if ( 'off' !== $pt_serif ) {
			$font_families[] = 'PT Serif:400,700,400italic';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param  array|array   $urls           URLs to print for resource hints.
 * @param  string|string $relation_type  The relation type the URLs are printed.
 * @return array|array   $urls           URLs to print for resource hints.
 */
function pinto_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'pinto-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'pinto_resource_hints', 10, 2 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pinto_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}

add_action( 'wp_head', 'pinto_pingback_header' );

/**
 * Manually set an excerpt length.
 */
function pinto_custom_excerpt_length( $length ) {
	return 34;
}
add_filter( 'excerpt_length', 'pinto_custom_excerpt_length', 999 );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Metaboxes.
 */
require get_theme_file_path( '/inc/metaboxes.php' );

/**
 * Widgets.
 */
require get_theme_file_path( '/inc/widgets/widget-flickr.php' );
require get_theme_file_path( '/inc/widgets/widget-newsletter.php' );

/**
 * Customizer additions.
 */
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/customizer-editor.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Dashboard Doc.
 */
function themebeans_guide() {}

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}
