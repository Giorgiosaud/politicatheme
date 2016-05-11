 <?php 
 new EventCategory();
 class EventCategory{
 	public function __construct()
 	{
        add_action ('init', array(&$this, 'event_tax'));
 		add_action( 'init', array(&$this,'event_tax') );
 	}
 	public function event_tax(){
 		$labels = array(
 			'name'                       => _x( 'Categorias de Eventos', 'Taxonomy General Name', 'EventosGsZp' ),
 			'singular_name'              => _x( 'Categoria de Evento', 'Taxonomy Singular Name', 'EventosGsZp' ),
 			'menu_name'                  => __( 'Categorias de Eventos', 'EventosGsZp' ),
 			'all_items'                  => __( 'Todas Las Categorias de Eventos', 'EventosGsZp' ),
 			'parent_item'                => __( 'Categoria de Evento Padre', 'EventosGsZp' ),
 			'parent_item_colon'          => __( 'Categoria de Evento Padre:', 'EventosGsZp' ),
 			'new_item_name'              => __( 'Nueva Categoria de Evento', 'EventosGsZp' ),
 			'add_new_item'               => __( 'Añadir Nueva Categoria de Evento', 'EventosGsZp' ),
 			'edit_item'                  => __( 'Editar Categoria de Evento', 'EventosGsZp' ),
 			'update_item'                => __( 'Actualizar Categoria de Evento', 'EventosGsZp' ),
 			'view_item'                  => __( 'Ver Categoria de Evento', 'EventosGsZp' ),
 			'separate_items_with_commas' => __( 'Separate items with commas', 'EventosGsZp' ),
 			'add_or_remove_items'        => __( 'Add or remove items', 'EventosGsZp' ),
 			'choose_from_most_used'      => __( 'Choose from the most used', 'EventosGsZp' ),
 			'popular_items'              => __( 'Popular Items', 'EventosGsZp' ),
 			'search_items'               => __( 'Search Items', 'EventosGsZp' ),
 			'not_found'                  => __( 'Not Found', 'EventosGsZp' ),
 			'no_terms'                   => __( 'No items', 'EventosGsZp' ),
 			'items_list'                 => __( 'Items list', 'EventosGsZp' ),
 			'items_list_navigation'      => __( 'Items list navigation', 'EventosGsZp' ),
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

 		register_taxonomy('events_cat','eventosgszp',$args);
 	}
 }
