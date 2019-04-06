<?php
/**
 * The template for displaying all single posts.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

get_header(); ?>

<div id="primary-container">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'components/post/content', get_post_format() );

		endwhile;
	endif;
	?>

	<div class="container">

		<?php
		if ( true === get_theme_mod( 'show_alternate_meta', pinto_defaults( 'show_alternate_meta' ) ) ) {
			pinto_after_post_meta();
		}

		/*
		 * If comments are open or we have at least one comment, load up the comment template.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/comments_open/
		 * @link https://codex.wordpress.org/Template_Tags/get_comments_number/
		 * @link https://developer.wordpress.org/reference/functions/comments_template/
		 */
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	</div>
</div>

<?php
get_footer();
