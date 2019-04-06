<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

get_header(); ?>

<div id="primary-container">

	<?php

	if ( have_posts() ) :
		/* Start the Loop */
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

	<div class="pagination index">

		<span class="page-previous">
			<?php next_posts_link( '' ); ?>
		</span>

		<span class="page-next">
			<?php previous_posts_link( '' ); ?>
		</span>

	</div>

</div>

<?php
get_footer();
