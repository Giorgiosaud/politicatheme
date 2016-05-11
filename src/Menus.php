<?php

namespace jorgelsaud\PoliticayGobierno;

class Menus{
	/**
	 * 
	 */
	public function __construct()
	{
		// $this->menus_path= get_template_directory().'/elementos/menus.json' ;
		// if (file_exists($this->menus_path)) {
		// 	$this->menus = json_decode(file_get_contents($this->menus_path), true)["menus"];
		// } else {
		// 	$this->menus = [];
		// }
		add_action( 'init', array($this,'register' ));
	}
	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register(){
		register_nav_menus(array( // Using array to specify more menus if needed
        	'top-menu' => __('Top Menu', 'html5blank'), // Top Navigation
  			'main-menu'=>__('Main Menu', 'html5blank'), // Main Navigation
  			'bottom-menu'=>__('Bottom Menu', 'html5blank'), // Main Navigation
  			'publicaciones-menu'=>__('Tipos de Publicaciones', 'html5blank'), // Main Navigation
  			'eventos-menu'=>__('Tipos de Eventos', 'html5blank'), // Main Navigation

  		));
	}
}
