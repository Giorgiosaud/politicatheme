<?php
new PostgradoCustomPost();
class PostgradoCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Postgrado', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Postgrado', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Postgrado', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Postgrado', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Postgrado', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Postgrado Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Postgrado', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Postgrado', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Postgrado', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Postgrado', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Postgrado', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Postgrado', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Postgrado', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Postgrado', 'politicaygobierno' ),
		'not_found'             => __( 'Postgrado No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Postgrado No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Postgrado', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Postgrado', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Postgrado', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Postgrado', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Postgrado', 'politicaygobierno' ),


		);
		$arguments=array(
		'label'                 => __( 'Postgrado', 'politicaygobierno' ),
		'description'           => __( 'Postgrado de la Facultad', 'politicaygobierno' ),
		'labels'                => $labels,
		'supports'              => array( 'editor','author','title', 'revisions','excerpt','trackbacks','comments' ),
		'taxonomies'            => array(  '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 14,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'				=>'dashicons-welcome-learn-more',
		'capability_type'       => 'post',
		);
		
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerPostgrado'));
	}
	public function registerPostgrado(){
		register_post_type( 'postgrados', $this->arguments );
	}
}
