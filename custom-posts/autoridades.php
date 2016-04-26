<?php
new AutoridadesCustomPost();
class AutoridadesCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Autoridades', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Autoridad', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Autoridades', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Autoridades', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Autoridades', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Autoridad Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Autoridades', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Autoridad', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Autoridad', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Autoridad', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Autoridad', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Autoridad', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Autoridad', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Autoridad', 'politicaygobierno' ),
		'not_found'             => __( 'Autoridad No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Autoridad No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Autoridad', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Autoridad', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Autoridades', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Autoridades', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Autoridades', 'politicaygobierno' ),


		);
		$arguments=array(
		'label'                 => __( 'Autoridad', 'politicaygobierno' ),
		'description'           => __( 'Autoridades de la Facultad', 'politicaygobierno' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', ),
		'taxonomies'            => array(  'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'				=>'dashicons-nametag',
		'capability_type'       => 'post',
		);
		
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerAutoridades'));
	}
	public function registerAutoridades(){
		register_post_type( 'autoridades', $this->arguments );
	}
}
