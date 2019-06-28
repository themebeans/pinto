<?php
/**
 * The file is for displaying the blog post meta.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

// READING TIME CALCULATIONS.
$mycontent    = $post->post_content;
$words        = str_word_count( wp_strip_all_tags( $mycontent ) );
$reading_time = floor( $words / 100 );

// IF LESS THAN A MINUTE - DISPLAY 1 MINUTE.
if ( 0 === $reading_time ) {
	$reading_time = '1'; }
?>

<div class="entry-meta">
	<ul>
		<li class="mobile-hide"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></li>
		<li><div class="nav-sep mobile-hide">&middot;</div><time class="dt-published" datetime="<?php echo esc_attr( the_date( 'Y-m-d H:i:s' ) ); ?>"><?php echo the_time( 'M j Y' ); ?></time></li>
		<li class="mobile-hide"><div class="nav-sep">&middot;</div>
		<?php
			echo esc_html( $reading_time );
			esc_html_e( ' Minute Read', 'pinto' );
		?>
		</li>
		<?php edit_post_link( __( '&nbsp;Edit', 'pinto' ), '<div class="nav-sep">&middot;</div>' ); ?>
	</ul>
</div>
