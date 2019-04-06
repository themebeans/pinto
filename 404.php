<?php
/**
 * The template for displaying the 404 error page
 * This page is set automatically, not through the use of a template
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

get_header(); ?>

<div id="primary-container">

	<div class="row">

		<div class="twelve columns centered">
			<h3><?php esc_html_e( '404 Error.', 'pinto' ); ?></h3>
			<p><?php esc_html_e( 'Yikes. This page has not been found.', 'pinto' ); ?>
			<br/>
			&larr; <a href="javascript:javascript:history.go(-1)"><?php esc_html_e( 'Go Back', 'pinto' ); ?></a><?php esc_html_e( ' or ', 'pinto' ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go Home', 'pinto' ); ?></a> &rarr;</p>

		</div>

	</div>

</div>

<?php get_footer(); ?>
