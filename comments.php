<?php
/**
 * The template for displaying comments.
 * The area of the page that contains comments and the comment form.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

// PASSWORD PROTECTED.
if ( post_password_required() ) {
	return;
} ?>

<div id="comments">

	<?php if ( have_comments() ) : ?>

		<h3><?php comments_number( __( '0 Comments ', 'pinto' ), __( '1 Comment ', 'pinto' ), __( '% Comments ', 'pinto' ) ); ?></h3>

		<div id="comments-list" class="comments">

			<ol class="comment-list list-reset">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
				?>
			</ol>

			<?php
			the_comments_pagination();
			?>

		</div>

	<?php endif; ?>

	<?php
	comment_form();

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pinto' ); ?></p>
	<?php endif; ?>

</div>
