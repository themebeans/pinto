<?php
/**
 * The file for displaying the theme hidden sidebar.
 * It is called via the footer.php file.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */
?>

<div class="hidden-sidebar">

	<div class="hidden-sidebar-inner">

		<span class="close-btn"></span>

		<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>

			<div class="widget show-for-small">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'sort_column'    => 'menu_order',
						'menu_class'     => 'main-menu',
					)
				);
				?>

			</div>

		<?php } ?>

		<?php dynamic_sidebar( 'internal-sidebar' ); ?>

	</div>

</div>
