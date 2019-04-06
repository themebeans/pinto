<?php
/**
 * The template for displaying the default searchform whenever it is called in the theme.
 *
 * @package     Pinto
 * @link        https://themebeans.com/themes/pinto
 */
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" id="s" value="<?php esc_html_e( 'To search type & hit enter', 'pinto' ); ?>" onfocus="if(this.value=='<?php esc_html_e( 'To search type & hit enter', 'pinto' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_html_e( 'To search type & hit enter', 'pinto' ); ?>';" />
</form>
