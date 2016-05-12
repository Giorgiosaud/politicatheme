<?php
new DocentesCustomPost();
class DocentesCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Docentes', 'Post Type General Name', 'politicaygobierno' ),
		'singular_name'         => _x( 'Docente', 'Post Type Singular Name', 'politicaygobierno' ),
		'menu_name'             => __( 'Docentes', 'politicaygobierno' ),
		'name_admin_bar'        => __( 'Docentes', 'politicaygobierno' ),
		'archives'              => __( 'Archivo de Docentes', 'politicaygobierno' ),
		'parent_item_colon'     => __( 'Docente Superior', 'politicaygobierno' ),
		'all_items'             => __( 'Todos Los Docentes', 'politicaygobierno' ),
		'add_new_item'          => __( 'Añadir Nuevo Docente', 'politicaygobierno' ),
		'add_new'               => __( 'Nuevo Docente', 'politicaygobierno' ),
		'new_item'              => __( 'Nuevo Docente', 'politicaygobierno' ),
		'edit_item'             => __( 'Editar Docente', 'politicaygobierno' ),
		'update_item'           => __( 'Actualizar Docente', 'politicaygobierno' ),
		'view_item'             => __( 'Ver Docente', 'politicaygobierno' ),
		'search_items'          => __( 'Buscar Docente', 'politicaygobierno' ),
		'not_found'             => __( 'Docente No Encontrado', 'politicaygobierno' ),
		'not_found_in_trash'    => __( 'Docente No Encontrado en la Papelera', 'politicaygobierno' ),
		'featured_image'        => __( 'Imagen Predefinida', 'politicaygobierno' ),
		'set_featured_image'    => __( 'Definir Imagen', 'politicaygobierno' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'politicaygobierno' ),
		'use_featured_image'    => __( 'Usar como imagen', 'politicaygobierno' ),
		'insert_into_item'      => __( 'Insertar en Docente', 'politicaygobierno' ),
		'uploaded_to_this_item' => __( 'Subidos a este Docente', 'politicaygobierno' ),
		'items_list'            => __( 'Lista de Docentes', 'politicaygobierno' ),
		'items_list_navigation' => __( 'Lista de navegacion de Docentes', 'politicaygobierno' ),
		'filter_items_list'     => __( 'Filtrar lista de Docentes', 'politicaygobierno' ),


		);
		$arguments=array(
		'label'                 => __( 'Docente', 'politicaygobierno' ),
		'description'           => __( 'Docentes de la Facultad', 'politicaygobierno' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions','editor' ),
		'taxonomies'            => array(  'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 11,
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
        add_action ('init', array(&$this, 'registerDocentes'));
	}
	public function registerDocentes(){
		register_post_type( 'docentes', $this->arguments );
	}
}
