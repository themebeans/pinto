<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

if ( ! function_exists( 'pinto_post_media' ) ) :
	/**
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param string|int $post_id The current post's id.
	 */
	function pinto_post_media( $post_id ) {

		global $post;

		/* Return if on search */
		if ( is_search() ) {
			return;
		}

		/* Don't do anything if this post is password protected. */
		if ( post_password_required() ) {
			return;
		}

		/* Video Post Format */
		$oembed = get_post_meta( get_the_ID(), '_bean_video_embed', 1 );

		/* Check if the post has an oEmbed. */
		if ( $oembed ) {

			$output = sprintf( '<div class="entry-video">%1$s</div>', wp_oembed_get( esc_url( $oembed ) ) );

			$allowed_html = array(
				'div'    => array(
					'class' => array(),
				),
				'iframe' => array(
					'class'       => array(),
					'style'       => array(),
					'height'      => array(),
					'width'       => array(),
					'src'         => array(),
					'frameborder' => array(),
				),
			);

			echo wp_kses( $output, $allowed_html );

			return;
		}

		// If Gutenberg exists, do not use the featured image.
		if ( is_singular() && function_exists( 'register_block_type' ) ) {
			return;
		}

		/* Don't do anything if there's no post thumbnail. */
		if ( ! has_post_thumbnail() ) {
			return;
		}

		if ( '' !== get_the_post_thumbnail() ) {
			?>

			<div class="entry-media">

				<?php
				if ( is_singular() ) :
					the_post_thumbnail( 'thumbnail-large' );
				else :
					?>
					<a class="post-thumbnail" href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true">
						<?php the_post_thumbnail( 'thumbnail-large' ); ?>
					</a>
					<?php
				endif;
				?>

			</div>

			<?php
		}
	}
endif;

if ( ! function_exists( 'pinto_site_logo' ) ) :
	/**
	 * Output an <img> tag of the site logo.
	 */
	function pinto_site_logo() {

		$visibility = ( has_custom_logo() ) ? ' hidden' : null;

		do_action( 'pinto_before_site_logo' );

		the_custom_logo();

		if ( ! has_custom_logo() || is_customize_preview() ) {
			printf( '<h1 class="site-title site-logo %1$s" itemscope itemtype="http://schema.org/Organization"><a href="%2$s" rel="home" itemprop="url">%3$s</a></h1>', esc_attr( $visibility ), esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) );

		}

		do_action( 'pinto_after_site_logo' );
	}

endif;

if ( ! function_exists( 'pinto_get_word_count' ) ) {
	function pinto_get_word_count() {
		ob_start();
		the_content();
		$content = ob_get_clean();
		return sizeof( explode( ' ', $content ) );
	}
}

/**
 * Add post meta after the post.
 */
if ( ! function_exists( 'pinto_after_post_meta' ) ) {

	function pinto_after_post_meta() {
	?>

		<div class="entry-meta-after">
			<ul>
				<li><span class="meta-icon author"></span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></li>

				<li><span class="meta-icon category"></span><?php the_category( ', ' ); ?></li>

				<li>
					<span class="meta-icon words"></span>
					<?php
					echo esc_html( pinto_get_word_count() );
					esc_html_e( ' Words', 'pinto' );
					?>
				</li>

				<?php if ( has_tag() ) { ?>
					<li><span class="meta-icon tags"></span><?php the_tags( '', ', ', '' ); ?></li>
				<?php } ?>
			</ul>
		</div>

		<?php
	}
}
