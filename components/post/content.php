<?php
/**
 * The default template for displaying content for the standard post.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

$image_class = '';
?>

<?php
if ( ( function_exists( 'has_post_thumbnail' ) ) && ( ! has_post_thumbnail() ) ) {
	$image_class = 'no-feat'; }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $image_class ) ); ?>>

	<?php pinto_post_media( $post->ID ); ?>

	<header class="entry-header container">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title h1 p-name">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title h1 p-name"><a class="u-url" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header>

	<?php get_template_part( 'components/post/post-meta' ); ?>

	<div class="<?php echo esc_attr( pinto_content_class() ); ?>">

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
