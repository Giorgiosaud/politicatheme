<?php
new ProfesoresCustomPost();
class ProfesoresCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Profesores', 'Post Type General Name', 'Profesores' ),
		'singular_name'         => _x( 'Profesor', 'Post Type Singular Name', 'Profesores' ),
		'menu_name'             => __( 'Profesores', 'Profesores' ),
		'name_admin_bar'        => __( 'Profesores', 'Profesores' ),
		'archives'              => __( 'Archivo de Profesores', 'Profesores' ),
		'parent_item_colon'     => __( 'Profesor Padre', 'Profesores' ),
		'all_items'             => __( 'Todos Los Profesores', 'Profesores' ),
		'add_new_item'          => __( 'Añadir Nuevo Profesor', 'Profesores' ),
		'add_new'               => __( 'Nuevo Profesor', 'Profesores' ),
		'new_item'              => __( 'Nuevo Profesor', 'Profesores' ),
		'edit_item'             => __( 'Editar Profesor', 'Profesores' ),
		'update_item'           => __( 'Actualizar Profesor', 'Profesores' ),
		'view_item'             => __( 'Ver Profesor', 'Profesores' ),
		'search_items'          => __( 'Buscar Profesor', 'Profesores' ),
		'not_found'             => __( 'Profesor No Encontrado', 'Profesores' ),
		'not_found_in_trash'    => __( 'Profesor No Encontrado en la Papelera', 'Profesores' ),
		'featured_image'        => __( 'Imagen Predefinida', 'Profesores' ),
		'set_featured_image'    => __( 'Definir Imagen', 'Profesores' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'Profesores' ),
		'use_featured_image'    => __( 'Usar como imagen', 'Profesores' ),
		'insert_into_item'      => __( 'Insertar en Profesor', 'Profesores' ),
		'uploaded_to_this_item' => __( 'Subidos a este Profesor', 'Profesores' ),
		'items_list'            => __( 'Lista de Profesores', 'Profesores' ),
		'items_list_navigation' => __( 'Lista de navegacion de Profesores', 'Profesores' ),
		'filter_items_list'     => __( 'Filtrar lista de Profesores', 'Profesores' ),


		);
		$arguments=array(
		'label'                 => __( 'Profesor', 'Profesores' ),
		'description'           => __( 'Events Mananger', 'Profesores' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', ),
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
		'menu_icon'				=>'dashicons-welcome-learn-more',
		'capability_type'       => 'profesor',
		'rewrite' => array('slug' => 'profesores','name'=>'profesores')
		);
		
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerProfesores'));
	}
	public function registerProfesores(){
		// die(var_dump($this->arguments));
		register_post_type( 'profesores', $this->arguments );
	}
}