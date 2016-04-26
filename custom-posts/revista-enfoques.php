<?php
new RevistaCustomPost();
class RevistaCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Revista Enfoques', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Revista', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Revista Enfoques', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Revista Enfoques', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Revista', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Revista Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Revista', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Revista', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Revista', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Revista', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Revista', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Revista', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Revista', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Revista', 'politicaygobierno' ),
		'not_found'             => __( 'Revista No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Revista No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Revista', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Revista', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Revista', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Revista', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Revista', 'politicaygobierno' ),


		);
		$arguments=array(
		'label'                 => __( 'Revista', 'politicaygobierno' ),
		'description'           => __( 'Revista de la Facultad', 'politicaygobierno' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', ),
		'taxonomies'            => array(  'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 15,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'				=>'dashicons-archive',
		'capability_type'       => 'post',
		);
		
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerRevista'));
	}
	public function registerRevista(){
		register_post_type( 'revistas', $this->arguments );
	}
}
