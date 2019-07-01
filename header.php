<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>
	<div id="theme-wrapper">

		<div class="row">

			<div id="header-container" class="h-card">

				<?php pinto_site_logo(); ?>

				<a id="menu-toggle" class="sidebar-btn menu-toggle" href="#" title="<?php echo esc_html__( 'Toggle Menu', 'pinto' ); ?>" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php echo esc_html__( 'Toggle Menu', 'pinto' ); ?></span>
				</a>

				<div id="primary-nav" class="main-menu hide-for-small" role="navigation">

					<?php
					if ( has_nav_menu( 'primary-menu' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary-menu',
								'container'      => '',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'sf-menu main-menu',
								'after'          => '<span class="nav-sep">&nbsp;&middot;</span>',
							)
						);
					}
					?>

				</div>

				<?php if ( is_home() ) { ?>

					<?php if ( get_theme_mod( 'header_tagline', pinto_defaults( 'header_tagline' ) ) ) { ?>

						<div class="six columns centered">
							<div class="theme-tagline">
								<p class="p-note"><?php echo get_theme_mod( 'header_tagline', pinto_defaults( 'header_tagline' ) ); ?></p>
							</div>
						</div>

					<?php } ?>

				<?php } ?>

			</div>

		</div>
