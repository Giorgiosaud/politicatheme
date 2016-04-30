<?php

use jorgelsaud\PoliticayGobierno\Evento;
use jorgelsaud\PoliticayGobierno\SlidersWidgetEventos;
use jorgelsaud\PoliticayGobierno\SlideWidgetEvento;

function eventosgszp_load_widget() {
	register_widget( 'eventosgszp_widget' );
}
add_action( 'widgets_init', 'eventosgszp_load_widget' );
// Creating the widget 
class eventosgszp_widget extends WP_Widget {
	function __construct() {
		$this->getEventos();
		parent::__construct(
			// Base ID of your widget
			'eventosgszp_widget', 

			// Widget name will appear in UI
			__('Widget de Proximos Eventos', 'EventosGsZp'), 

			// Widget description
			array( 'description' => __( 'Widget Para visualizar proximos eventos', 'EventosGsZp' ), ) 
			);
	}
	private function getEventos(){

		date_default_timezone_set("Chile/Continental");
		//Today's date
		$date_1 = date('Ymd', strtotime("now")); 
		//Future date - the arg will look between today's date and this future date to see if the post fall within the 2 dates.
		$date_2 = date('Ymd', strtotime("+12 months"));
		$upcoming_args = array(
			'post_type'		=> 'eventosgszp',
			'posts_per_page'	=> -1,
			'meta_key' => 'fecha_del_evento',
			'meta_compare' => 'BETWEEN',
			'meta_type' => 'numeric',
			'meta_value' => array($date_1, $date_2),
			'orderby' => 'meta_value_num',
			'order' => 'ASC'
			); 
		
		$this->eventos=[];
		$eventos_posts_query = new WP_Query( $upcoming_args );
		if ( $eventos_posts_query->have_posts() ) {
			while ( $eventos_posts_query->have_posts() ) {
				$eventos_posts_query->the_post();
				// echo get_sub_field('imagen_noticia').'<br>';
				$imagen=get_field('imagen_del_evento');
				if($imagen==null){
					$imagen=wp_get_attachment_image_src(get_theme_mod('eventos_por_defecto'),'evento')[0];
					if($imagen==''){
						$imagen=get_template_directory_uri().'/img/eventos_defecto.png';
					}
				}
				$evento=new Evento(get_the_title(),get_permalink(), $imagen,date_i18n('d \d\e F',strtotime(get_field('fecha_del_evento'))),get_field('hora_del_evento'));
				array_push($this->eventos,$evento);
			}
		}
		else{
			$imagen=get_template_directory_uri().'/img/eventos_defecto.png';
			$evento=new Evento('No Hay Eventos Futuros','#', $imagen,$date_1,'0000');
			array_push($this->eventos,$evento);

		}
		wp_reset_postdata();
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo '<div class="Widget__Calendario__Titulo">'. $title . '</div>';
		$slider=new SlidersWidgetEventos();
		foreach ($this->eventos as $key => $evento) {
			$titulo="<span class='WC__SL__Fecha'>{$evento->fecha}</span><span class='WC__SL_Hora'>{$evento->hora}</span>";
			$slide=new SlideWidgetEvento($titulo,$evento->titulo,$evento->imagen,$evento->link);
			$slider->addSlide($slide);
			
		}
		echo $slider->show();

		echo $args['after_widget'];
	}

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
