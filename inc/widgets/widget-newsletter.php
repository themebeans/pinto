<?php
/**
 * Widget Name: Bean Newsletter
 */

// Register widget.
add_action(
	'widgets_init', function() {
		return register_widget( 'Bean_Newsletter_Widget' );
	}
);

class Bean_Newsletter_Widget extends WP_Widget {

	// Constructor
	function __construct() {
		parent::__construct(
			'bean_newsletter', // Base ID
			__( 'Newsletter', 'pinto' ), // Name
			array( 'description' => __( 'Add a newsletter field.', 'pinto' ) ) // Args
		);
	}

	// Display widget
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		// Variables
		$placeholder   = $instance['placeholder'];
		$subscribecode = $instance['subscribecode'];
		$desc          = $instance['desc'];
		$animate       = $instance['animate'];

		// Before
		echo balanceTags( $before_widget );

		?>

		<?php
		if ( $title ) {
			echo balanceTags( $before_title ) . esc_html( $title ) . balanceTags( $after_title );}
?>

			<?php
			if ( $desc != '' ) :
?>
			<p><?php echo esc_html( $desc ); ?></p><?php endif; ?>

			<form action="<?php echo esc_attr( $subscribecode ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

				<input type="email" name="EMAIL" class="email-newsletter" id="mce-EMAIL" value="<?php echo esc_attr( $placeholder ); ?>" required="" onfocus="this.value='';" onblur="if(this.value=='')this.value='<?php echo esc_attr( $placeholder ); ?>';">

				<input type="submit" value="<?php esc_html_e( 'Subscribe', 'pinto' ); ?>" class="button">

			</form><!-- END .form -->

		<?php

		// After
		echo $after_widget;
	}

	// Update Widget
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']         = wp_strip_all_tags( $new_instance['title'] );
		$instance['subscribecode'] = stripslashes( $new_instance['subscribecode'] );
		$instance['placeholder']   = stripslashes( $new_instance['placeholder'] );
		$instance['desc']          = stripslashes( $new_instance['desc'] );

		return $instance;
	}

	// Display widget
	function form( $instance ) {
		$defaults = array(
			'title'         => 'Newsletter',
			'placeholder'   => 'Email address...',
			'subscribecode' => '',
			'desc'          => 'This is a nice and simple  email newsletter widget.',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title / Intro:', 'pinto' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p style="margin-top: -8px;">
		<textarea class="widefat" rows="5" cols="15" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_html( $instance['desc'] ); ?></textarea>
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'placeholder' ) ); ?>"><?php esc_html_e( 'Placeholder Text:', 'pinto' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'placeholder' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'placeholder' ) ); ?>" value="<?php echo esc_attr( $instance['placeholder'] ); ?>" />
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'subscribecode' ) ); ?>"><?php esc_html_e( 'Subscribe Code:', 'pinto' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subscribecode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subscribecode' ) ); ?>" value="<?php echo esc_attr( $instance['subscribecode'] ); ?>" />
		</p>
	<?php
	} //END form
} //END class
