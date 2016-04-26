<?php
new EventoCustomPost();
class EventoCustomPost{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Eventos', 'Post Type General Name', 'EventosGsZp' ),
		'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'EventosGsZp' ),
		'menu_name'             => __( 'Eventos', 'EventosGsZp' ),
		'name_admin_bar'        => __( 'Eventos', 'EventosGsZp' ),
		'archives'              => __( 'Archivo de Eventos', 'EventosGsZp' ),
		'parent_item_colon'     => __( 'Evento Padre', 'EventosGsZp' ),
		'all_items'             => __( 'Todos Los Eventos', 'EventosGsZp' ),
		'add_new_item'          => __( 'Añadir Nuevo Evento', 'EventosGsZp' ),
		'add_new'               => __( 'Nuevo Evento', 'EventosGsZp' ),
		'new_item'              => __( 'Nuevo Evento', 'EventosGsZp' ),
		'edit_item'             => __( 'Editar Evento', 'EventosGsZp' ),
		'update_item'           => __( 'Actualizar Evento', 'EventosGsZp' ),
		'view_item'             => __( 'Ver Evento', 'EventosGsZp' ),
		'search_items'          => __( 'Buscar Evento', 'EventosGsZp' ),
		'not_found'             => __( 'Evento No Encontrado', 'EventosGsZp' ),
		'not_found_in_trash'    => __( 'Evento No Encontrado en la Papelera', 'EventosGsZp' ),
		'featured_image'        => __( 'Imagen Predefinida', 'EventosGsZp' ),
		'set_featured_image'    => __( 'Definir Imagen', 'EventosGsZp' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'EventosGsZp' ),
		'use_featured_image'    => __( 'Usar como imagen', 'EventosGsZp' ),
		'insert_into_item'      => __( 'Insertar en Evento', 'EventosGsZp' ),
		'uploaded_to_this_item' => __( 'Subidos a este Evento', 'EventosGsZp' ),
		'items_list'            => __( 'Lista de Eventos', 'EventosGsZp' ),
		'items_list_navigation' => __( 'Lista de navegacion de Eventos', 'EventosGsZp' ),
		'filter_items_list'     => __( 'Filtrar lista de Eventos', 'EventosGsZp' ),


		);
		$arguments=array(
		'label'                 => __( 'Evento', 'EventosGsZp' ),
		'description'           => __( 'Events Mananger', 'EventosGsZp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', ),
		'taxonomies'            => array(  'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 12,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'				=>'dashicons-calendar',
		'capability_type'       => 'post',
		'rewrite' => array('slug' => 'eventos','name'=>'eventos')
		);
		
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerEventosGsZp'));
	}
	public function registerEventosGsZp(){
		// die(var_dump($this->arguments));
		register_post_type( 'eventosgszp', $this->arguments );
	}
}
