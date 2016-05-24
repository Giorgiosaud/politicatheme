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

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		// This is where you run the code and display the output
		echo $this->showSubscription($instance);
		echo $args['after_widget'];
	}
	public function showSubscription($instance){
		$title = apply_filters( 'widget_title', $instance['title'] );
		ob_start();?>
		<div class="Subscription">
			<div class="Subscription__container">
				<div class="Subscription__Title">
					<?= $title ?>
				</div>
				<div class="Subscription__SubTitle">
					<a href="<?php $this->ifIsSetThenEcho($instance['subscribe_link'],'#')?>">
						<?= $instance['subscribe_text'] ?>
					</a>
				</div>
				<div class="Subscription__Socials">
					<?php if($instance['facebook_link']) {?>
					<a href="<?= $instance['facebook_link']?>">
						<span class="socicon socicon-facebook"></span>
					</a>
					<?php } ?>
					<?php if($instance['twitter_link']) {?>
					<a href="<?= $instance['twitter_link']?>">
						<span class="socicon socicon-twitter"></span>
					</a>
					<?php } ?>
					<?php if($instance['youtube_link']) {?>
					<a href="<?= $instance['youtube_link']?>">
						<span class="socicon socicon-youtube"></span>
					</a>
					<?php } ?>
					<?php if($instance['linkedIn_link']) {?>
					<a href="<?= $instance['linkedIn_link']?>">
						<span class="socicon socicon-linkedin"></span>
					</a>
					<?php } ?>
					<?php if($instance['instagram_link']) {?>
					<a href="<?= $instance['instagram_link']?>">
						<span class="socicon socicon-instagram"></span>
					</a>
					<?php } ?>
					<?php if($instance['google_plus_link']) {?>
					<a href="<?= $instance['google_plus_link']?>">
						<span class="socicon socicon-google"></span>
					</a>
					<?php } ?>
				</div>				
			</div>
		</div>
<?
		return ob_get_clean();
	}
	protected function ifIsSetThenEcho($var,$default=''){
		if(isset($var)&&$var!=''){
			echo esc_attr($var);
			return true;
		}
		echo $default;
		return false;
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Contáctese Con Nosotros', 'politicaygobierno' );
		}

		// Widget admin form
?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'subscribe_text' ); ?>"><?php _e( 'Subscribe Text:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'subscribe_text' ); ?>" name="<?php echo $this->get_field_name( 'subscribe_text' ); ?>" type="text" value="<?php  $this->ifIsSetThenEcho($instance['subscribe_text'] ) ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'subscribe_link' ); ?>"><?php _e( 'Subscribe Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'subscribe_link' ); ?>" name="<?php echo $this->get_field_name( 'subscribe_link' ); ?>" type="text" value="<?php  $this->ifIsSetThenEcho($instance['subscribe_link'] ) ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>"><?php _e( 'Facebook Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['facebook_link'] )); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>"><?php _e( 'Twitter Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['twitter_link'] )); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'youtube_link' ); ?>"><?php _e( 'Youtube Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'youtube_link' ); ?>" name="<?php echo $this->get_field_name( 'youtube_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['youtube_link'] )); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'linkedIn_link' ); ?>"><?php _e( 'LinkedIn Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'linkedIn_link' ); ?>" name="<?php echo $this->get_field_name( 'linkedIn_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['linkedIn_link'] )); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'instagram_link' ); ?>"><?php _e( 'Instagram Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>" name="<?php echo $this->get_field_name( 'instagram_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['instagram_link'] )); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'google_plus_link' ); ?>"><?php _e( 'Google+ Link:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'google_plus_link' ); ?>" name="<?php echo $this->get_field_name( 'google_plus_link' ); ?>" type="text" value="<?php ( $this->ifIsSetThenEcho($instance['google_plus_link'] )); ?>" />
</p>
<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Contáctese Con Nosotros';
		$instance['subscribe_text'] = ( ! empty( $new_instance['subscribe_text'] ) ) ? strip_tags( $new_instance['subscribe_text'] ) : 'Subscribase Para recibir nuestro Newsletter Mensual';
		$instance['subscribe_link'] = ( ! empty( $new_instance['subscribe_link'] ) ) ? strip_tags( $new_instance['subscribe_link'] ) : '';
		$instance['facebook_link'] = ( ! empty( $new_instance['facebook_link'] ) ) ? strip_tags( $new_instance['facebook_link'] ) : '';
		$instance['instagram_link'] = ( ! empty( $new_instance['instagram_link'] ) ) ? strip_tags( $new_instance['instagram_link'] ) : '';
		$instance['twitter_link'] = ( ! empty( $new_instance['twitter_link'] ) ) ? strip_tags( $new_instance['twitter_link'] ) : '';
		$instance['google_plus_link'] = ( ! empty( $new_instance['google_plus_link'] ) ) ? strip_tags( $new_instance['google_plus_link'] ) : '';
		$instance['youtube_link'] = ( ! empty( $new_instance['youtube_link'] ) ) ? strip_tags( $new_instance['youtube_link'] ) : '';
		$instance['linkedIn_link'] = ( ! empty( $new_instance['linkedIn_link'] ) ) ? strip_tags( $new_instance['linkedIn_link'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
