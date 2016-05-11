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
 			'name'                       => _x( 'Tipos de Postgrado', 'Taxonomy General Name', 'politicaygobierno' ),
 			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'politicaygobierno' ),
 			'menu_name'                  => __( 'Tipos de Postgrado', 'politicaygobierno' ),
 			'all_items'                  => __( 'Todas Las Tipos', 'politicaygobierno' ),
 			'parent_item'                => __( 'Tipo Padre', 'politicaygobierno' ),
 			'parent_item_colon'          => __( 'Tipo Padre:', 'politicaygobierno' ),
 			'new_item_name'              => __( 'Nueva Tipo', 'politicaygobierno' ),
 			'add_new_item'               => __( 'Añadir Nuevo Tipo', 'politicaygobierno' ),
 			'edit_item'                  => __( 'Editar Tipo', 'politicaygobierno' ),
 			'update_item'                => __( 'Actualizar Tipo', 'politicaygobierno' ),
 			'view_item'                  => __( 'Ver Tipo', 'politicaygobierno' ),
 			'separate_items_with_commas' => __( 'Separate items with commas', 'politicaygobierno' ),
 			'add_or_remove_items'        => __( 'Add or remove items', 'politicaygobierno' ),
 			'choose_from_most_used'      => __( 'Choose from the most used', 'politicaygobierno' ),
 			'popular_items'              => __( 'Popular Items', 'politicaygobierno' ),
 			'search_items'               => __( 'Search Items', 'politicaygobierno' ),
 			'not_found'                  => __( 'Not Found', 'politicaygobierno' ),
 			'no_terms'                   => __( 'No items', 'politicaygobierno' ),
 			'items_list'                 => __( 'Items list', 'politicaygobierno' ),
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

 		register_taxonomy('tipo','postgrados',$args);
 	}
 }
