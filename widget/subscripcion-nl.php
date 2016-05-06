<?php

function subscripcion_load() {
	register_widget( 'subscripcion' );
}
add_action( 'widgets_init', 'subscripcion_load' );
// Creating the widget 
class subscripcion extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'subscripcion', 

			// Widget name will appear in UI
			__('Boton de Suscripcion ', 'politicaygobierno'), 

			// Widget description
			array( 'description' => __( 'Widget Para Suscripcion de Mailchimp', 'politicaygobierno' ), ) 
			);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance['title'] );
		$title_pregrado = $instance['title_pregrado'];
		$title_postgrado = $instance['title_postgrado'];
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		// This is where you run the code and display the output
		echo $this->showSubscription();
		echo $args['after_widget'];
	}
	public function showSubscription(){
		ob_start();?>
		<div class="Subscription">
			<div class="Subscription__container">
					<div class="Subscription__Title">
						Suscríbete a Nuestro Newsletter
					</div>
					<div class="Subscription__Form">
						<form id="mailchimpSubscription" action="">
						<input type="email" name="email" id="email">
						<input type="submit" class="MailchimpSubscribe">
						</form>
					</div>				
			</div>
		</div>
		<?
		return ob_get_clean();
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'politicaygobierno' );
		}
		
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
