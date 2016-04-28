 <?php 
 new publicacionesCategory();
 class publicacionesCategory{
 	public function __construct()
 	{
 		add_action ('init', array(&$this, 'publicaciones_category'));
 	}
 	public function publicaciones_category(){
 		$labels = array(
 			'name'                       => _x( 'Tipo de Publicacion', 'Taxonomy General Name', 'politicaygobierno' ),
 			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'politicaygobierno' ),
 			'menu_name'                  => __( 'Tipo de Publicacion', 'politicaygobierno' ),
 			'all_items'                  => __( 'Todas Las Tipo de Publicacion', 'politicaygobierno' ),
 			'parent_item'                => __( 'Tipo Padre', 'politicaygobierno' ),
 			'parent_item_colon'          => __( 'Tipo Padre:', 'politicaygobierno' ),
 			'new_item_name'              => __( 'Nuevo Tipo', 'politicaygobierno' ),
 			'add_new_item'               => __( 'Añadir Nuevo Tipo', 'politicaygobierno' ),
 			'edit_item'                  => __( 'Editar Tipo', 'politicaygobierno' ),
 			'update_item'                => __( 'Actualizar Tipo', 'politicaygobierno' ),
 			'view_item'                  => __( 'Ver Tipo', 'politicaygobierno' ),
 			'separate_items_with_commas' => __( 'Separar Tipos Con Comas', 'politicaygobierno' ),
 			'add_or_remove_items'        => __( 'Añadir o borrar Tipos de Publicacion', 'politicaygobierno' ),
 			'choose_from_most_used'      => __( 'Escojer Los Tipos de Publicacion Mas utilizados', 'politicaygobierno' ),
 			'popular_items'              => __( 'Tipos Populares', 'politicaygobierno' ),
 			'search_items'               => __( 'Buscat Tipos de Publicacion', 'politicaygobierno' ),
 			'not_found'                  => __( 'No Encontrado', 'politicaygobierno' ),
 			'no_terms'                   => __( 'Sin tipos', 'politicaygobierno' ),
 			'items_list'                 => __( 'Listar Tipos de Publicaciones', 'politicaygobierno' ),
 			'items_list_navigation'      => __( 'Items list navigation', 'politicaygobierno' ),
 			);
 		$args = array(
 			'labels'                     => $labels,
 			'hierarchical'               => false,
 			'public'                     => true,
 			'show_ui'                    => true,
 			'show_admin_column'          => true,
 			'show_in_nav_menus'          => true,
 			'show_tagcloud'              => true,
 			);

 		register_taxonomy('publicaciones_category','publicaciones',$args);
 	}
 }
