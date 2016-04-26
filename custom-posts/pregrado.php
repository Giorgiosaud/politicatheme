<?php
new PregradoCustomPost();
class PregradoCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Pregrado', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Pregrado', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Pregrado', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Pregrado', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Pregrado', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Pregrado Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Pregrado', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Pregrado', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Pregrado', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Pregrado', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Pregrado', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Pregrado', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Pregrado', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Pregrado', 'politicaygobierno' ),
		'not_found'             => __( 'Pregrado No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Pregrado No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Pregrado', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Pregrado', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Pregrado', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Pregrado', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Pregrado', 'politicaygobierno' ),


		);
		$arguments=array(
		'label'                 => __( 'Pregrado', 'politicaygobierno' ),
		'description'           => __( 'Pregrado de la Facultad', 'politicaygobierno' ),
		'labels'                => $labels,
		'supports'              => array( 'editor','author','title', 'revisions','excerpt','trackbacks','comments' ),
		'taxonomies'            => array(  'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 13,
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
        add_action ('init', array(&$this, 'registerPregrado'));
	}
	public function registerPregrado(){
		register_post_type( 'pregrados', $this->arguments );
	}
}
