<?php

function eventosgszp_load_widget_calendario() {
	register_widget( 'eventosgszp_widget_calendario' );
}
add_action( 'widgets_init', 'eventosgszp_load_widget_calendario' );
// Creating the widget 
class eventosgszp_widget_calendario extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'eventosgszp_widget_calendario', 

			// Widget name will appear in UI
			__('Widget de Calendario de Proximos Eventos', 'EventosGsZp'), 

			// Widget description
			array( 'description' => __( 'Widget Para visualizar proximos eventos en un Calendario', 'EventosGsZp' ), ) 
			);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		// if ( ! empty( $title ) )
		// echo $args['before_title'] . $title . $args['after_title'];
		// This is where you run the code and display the output
		echo '<div class="widgetcalendario"></div>';
		echo $args['after_widget'];
	}
	// 	$title = apply_filters( 'widget_title', $instance['title'] );
	// 	// before and after widget arguments are defined by themes
	// 	echo $args['before_widget'];
	// 	if ( ! empty( $title ) )
	// 	echo $args['before_title'] . $title . $args['after_title'];

	// 	echo '<div class="Widget__Calendario__Titulo">'. $title . '</div>';
	// 	$slider=new SlidersWidgetEventos();
	// 	foreach ($this->eventos as $key => $evento) {
	// 		$titulo="<span class='WC__SL__Fecha'>{$evento->fecha}</span><span class='WC__SL_Hora'>{$evento->hora}</span>";

	// 		$slide=new SlideWidgetEvento($titulo,$evento->titulo,$evento->imagen,$evento->link);
	// 		$slider->addSlide($slide);
	// 	}
	// 	echo $slider->show();

	// 	echo $args['after_widget'];
	// }

// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'EventosGsZp' );
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
