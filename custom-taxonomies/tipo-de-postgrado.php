 <?php
 new TipoDePostGrado();
 class TipoDePostGrado{
 	public function __construct()
 	{
        add_action ('init', array(&$this, 'tipo_de_postgrado'));
 		add_action( 'init', array(&$this,'tipo_de_postgrado') );
 	}
 	public function tipo_de_postgrado(){
 		$labels = array(
 			'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'EventosGsZp' ),
 			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'EventosGsZp' ),
 			'menu_name'                  => __( 'Tipos', 'EventosGsZp' ),
 			'all_items'                  => __( 'Todas Las Tipos', 'EventosGsZp' ),
 			'parent_item'                => __( 'Tipo Padre', 'EventosGsZp' ),
 			'parent_item_colon'          => __( 'Tipo Padre:', 'EventosGsZp' ),
 			'new_item_name'              => __( 'Nueva Tipo', 'EventosGsZp' ),
 			'add_new_item'               => __( 'Añadir Nuevo Tipo', 'EventosGsZp' ),
 			'edit_item'                  => __( 'Editar Tipo', 'EventosGsZp' ),
 			'update_item'                => __( 'Actualizar Tipo', 'EventosGsZp' ),
 			'view_item'                  => __( 'Ver Tipo', 'EventosGsZp' ),
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

 		register_taxonomy('tipo','postgrados',$args);
 	}
 }
