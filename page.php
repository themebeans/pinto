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
			get_template_part( 'components/page/content', 'page' );
		endwhile;
	endif;
	?>

	<div class="container">

		<?php
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
