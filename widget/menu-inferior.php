<?php
use jorgelsaud\PoliticayGobierno\Pregrado;
use jorgelsaud\PoliticayGobierno\Postgrado;

function menu_inferior_load() {
	register_widget( 'menuInferior' );
}
add_action( 'widgets_init', 'menu_inferior_load' );
// Creating the widget 
class menuInferior extends WP_Widget {
	function __construct() {
		$this->getPregrados();
		parent::__construct(
			// Base ID of your widget
			'menuInferior', 

			// Widget name will appear in UI
			__('Menu Inferior Pagina Inicial ', 'politicaygobierno'), 

			// Widget description
			array( 'description' => __( 'Widget Para visualizar proximos eventos en un Calendario', 'politicaygobierno' ), ) 
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
		echo $this->showMenu($title_pregrado,$title_postgrado);
		echo $args['after_widget'];
	}
	public function showMenu($tituloPregrado,$tituloPostgrado){
		ob_start();?>
		<div class="menuInferior">
			<div class="menuInferior__Padre">
				<div class="menuInferior__Padre__Titulo">
					<span class="glyphicon glyphicon-menu-right"></span><a href="/pregrado"><?= $tituloPregrado ?></a>
				</div>
				<div class="menuInferior__Hijos">
					<?php foreach ($this->pregrados as $key => $pregrado) {
						?>
						<div class="menuInferior__Hijo">
							<a href="<?=$pregrado->link()?>"><?=$pregrado->titulo()?></a>
						</div>
						<?php
					};?>
				</div>
			</div>
			<div class="menuInferior__Padre">
				<div class="menuInferior__Padre__Titulo active">
				<span class="glyphicon glyphicon-menu-right"></span><a href="/postgrado-y-educacion-continua/"><?= $tituloPostgrado ?></a>
				</div>
				<div class="menuInferior__Hijos active">
					<div class="menuInferior__Hijo">
						<a href="/tipo/pep/">Programa Ejecutivo para Profesionales (PEP)</a>
					</div>
					<div class="menuInferior__Hijo">
						<a href="/tipo/magister/">Magíster</a>
					</div>
					<div class="menuInferior__Hijo">
						<a href="/tipo/diplomados/">Diplomados</a>
					</div>
					<div class="menuInferior__Hijo">
						<a href="/tipo/postitulos/">Postitulos</a>
					</div>
				</div>
			</div>
		</div>

		<?
		return ob_get_clean();
	}
	private function getArguments($tipo){
		return $args = array (
			'post_type'              => $tipo,
			'post_status'            => array( 'publish' ),
			'order'                  => 'DESC',
			);
	}
	public function getPregrados(){
		$this->pregrados=[];
		$arg=$this->getArguments('pregrados');
		$pregrados_posts_query = new WP_Query( $arg );
		if ( $pregrados_posts_query->have_posts() ) {
			while ( $pregrados_posts_query->have_posts() ) {
				$pregrados_posts_query->the_post();
				$pregrado=new Pregrado(get_the_title(),get_permalink());
				array_push($this->pregrados,$pregrado);
			}
		}
		wp_reset_postdata();
	}
// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'politicaygobierno' );
		}
		if ( isset( $instance[ 'title_pregrado' ] ) ) {
			$title_pregrado = $instance[ 'title_pregrado' ];
		}
		else{
			$title_pregrado = __( 'Carreras de Pregrado', 'politicaygobierno' );	
		}
		if ( isset( $instance[ 'title_postgrado' ] ) ) {
			$title_postgrado = $instance[ 'title_postgrado' ];
		}
		else{
			$title_postgrado = __( 'Postgrado y Educación Contínua', 'politicaygobierno' );	
		}
		
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title_pregrado' ); ?>"><?php _e( 'Title Pregrado:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_pregrado' ); ?>" name="<?php echo $this->get_field_name( 'title_pregrado' ); ?>" type="text" value="<?php echo esc_attr( $title_pregrado ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title_postgrado' ); ?>"><?php _e( 'Title Postgrado:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_postgrado' ); ?>" name="<?php echo $this->get_field_name( 'title_postgrado' ); ?>" type="text" value="<?php echo esc_attr( $title_postgrado ); ?>" />
		</p>
		<?php 
	}
	
// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['title_pregrado'] = ( ! empty( $new_instance['title_pregrado'] ) ) ? strip_tags( $new_instance['title_pregrado'] ) : $old_instance['title_pregrado'];
		$instance['title_postgrado'] = ( ! empty( $new_instance['title_postgrado'] ) ) ? strip_tags( $new_instance['title_postgrado'] ) : $old_instance['title_postgrado'];
		return $instance;
	}
} // Class wpb_widget ends here
