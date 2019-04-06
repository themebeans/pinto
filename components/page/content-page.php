<?php
/**
 * The default template for displaying content for the standard post.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php pinto_post_media( $post->ID ); ?>

	<header class="entry-header container">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title h1">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title h1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header>

	<div class="entry-content">

		<?php
		if ( is_singular() ) {
			the_content();
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'pinto' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>

	</div>

</article>
