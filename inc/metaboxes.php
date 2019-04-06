<?php
/**
 * Metaboxes.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

/**
 * Define the metabox and field configurations.
 */
function pinto_metaboxes() {

	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_bean_';

	// Set the context, based on whether or not Gutenberg is enabled.
	$context = ( function_exists( 'register_block_type' ) ) ? 'side' : 'normal';

	/**
	 * Video.
	 */
	$cmb = new_cmb2_box(
		array(
			'id'           => 'video_metabox',
			'title'        => esc_html__( 'Video Post Format', 'pinto' ),
			'object_types' => array( 'post' ),
			'context'      => $context,
			'priority'     => 'high',
		)
	);

	$cmb->add_field(
		array(
			'name' => esc_html__( 'Embed', 'pinto' ),
			'desc' => __( 'Enter a Youtube or Vimeo URL. Supports services listed <a target="_blank" href="http://codex.wordpress.org/Embeds">here</a>.', 'pinto' ),
			'id'   => $prefix . 'video_embed',
			'type' => 'oembed',
		)
	);
}
add_action( 'cmb2_admin_init', 'pinto_metaboxes' );
