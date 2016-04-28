<?php
new PublicacionesCustomPost();
class PublicacionesCustomPost{
	private $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$this->labels=array(
		'name'                  => _x( 'Publicaciones', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Publicacion', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Publicaciones', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Publicaciones', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Publicacion', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Publicacion Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Publicacion', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Publicacion', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Publicacion', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Publicacion', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Publicacion', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Publicacion', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Publicacion', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Publicacion', 'politicaygobierno' ),
		'not_found'             => __( 'Publicacion No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Publicacion No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Publicacion', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Publicacion', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Publicacion', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Publicacion', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Publicacion', 'politicaygobierno' ),


		);
		$this->arguments=array(
		'label'                 => __( 'Publicacion', 'politicaygobierno' ),
		'description'           => __( 'Publicacion de la Facultad', 'politicaygobierno' ),
		'labels'                => $this->labels,
		'supports'              => array( 'title', 'editor','revisions' ),
		'taxonomies'            => array(),
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
		
		// $this->labels = $labels;
		// $this->arguments = $arguments;
        add_action ('init', array($this, 'registerPublicaciones'));
	}
	public function registerPublicaciones(){
		register_post_type( 'publicaciones', $this->arguments );
	}
}
