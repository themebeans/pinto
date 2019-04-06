<?php
/**
 * The template for displaying the footer.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

?>
	<div class="row">

		<div class="twelve columns">

			<div id="footer-container">

				<?php if ( get_theme_mod( 'footer_tagline', pinto_defaults( 'footer_tagline' ) ) ) { ?>

					<div class="six columns centered">

						<div class="theme-tagline">

							<p><?php echo get_theme_mod( 'footer_tagline', pinto_defaults( 'footer_tagline' ) ); ?></p>

						</div>

					</div>

				<?php } ?>

				<p class="copyright">
					<?php
					if ( get_theme_mod( 'footer_copyright', pinto_defaults( 'footer_copyright' ) ) ) {
						echo get_theme_mod( 'footer_copyright', pinto_defaults( 'footer_copyright' ) );
					} else {
						echo '&copy; ' . esc_html( date( 'Y' ) ) . ' <a href="http://themebeans.com/theme/pinto">Pinto</a> WordPress Theme&nbsp; - &nbsp; by <a href="http://themebeans.com">ThemeBeans</a>';
					}
					?>
				</p>
			</div>

		</div>

	</div>

</div>

<?php get_template_part( 'components/hidden-sidebar' ); ?>

<?php wp_footer(); ?>

</body>

</html>
