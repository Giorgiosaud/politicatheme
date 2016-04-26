<?php
new theme_customizer();
class theme_customizer{
	public function __construct()
	{
		// add_action ('admin_menu', array(&$this, 'customizer_admin'));
		add_action( 'customize_register', array($this, 'customize_manager_demo' ));
	}
	public function customize_manager_demo( $wp_manager )
	{
		$this->wp=$wp_manager;
		$this->footer_section();
		$this->news_section( $wp_manager );
		$this->eventos_section( $wp_manager );
		$this->docentes_section( $wp_manager );
		$this->autoridades_section( $wp_manager );
		$this->postgrado_section( $wp_manager );
		$this->pregrado_section( $wp_manager );
		$this->revistas_section( $wp_manager );
	}
	public function agregar_seccion($id,$title,$priority=36)
	{
		$this->wp->add_section( $id, array(
			'title'          => $title,
			'priority'       => $priority,
		) );
	}
	public function agregar_configuracion($id,array $setDef)
	{
		$this->wp->add_setting($id,$setDef);
	}
	public function agregar_control_texto($id,$section,$label,$default)
	{

		$this->wp->add_setting($id,array(
			'default'=>$default));
		$this->wp->add_control(new WP_Customize_control($this->wp,$id,array(
			'label'=>__($label,'politicaygobierno'),
			'section'=>$section,
			'settings'=>$id,
		)));
		
	}
	public function agregar_control_textarea($id,$section,$label,$default)
	{

		$this->wp->add_setting($id,array(
			'default'=>$default));
		$this->wp->add_control(new WP_Customize_control($this->wp,$id,array(
			'label'=>__($label,'politicaygobierno'),
			'section'=>$section,
			'settings'=>$id,
			'type'=>'textarea'
		)));
		
	}
	public function agregar_control_imagen_crop($id,$label,$setting,$section,$width,$height)
	{
		$this->wp->add_control(
			new WP_Customize_Cropped_Image_Control(
				$this->wp,
				$id,
				array(
					'label'    => $label,
					'settings' => $setting,
					'section'  => $section,
					'width'=>$width,
					'height'=>$height,
				)
			)
		);
	}
	public function postgrado_section($wp)
	{
		$this->agregar_seccion('postgrado','Configuracion Postgrado');
		$settings=array(
			'default'      => get_template_directory_uri().'/img/imagen_postgrado_por_defecto.jpg',
			'width'=>960,
			'height'=>560
			);

		$this->agregar_configuracion('imagen_postgrado',$settings);
		$this->agregar_control_imagen_crop('imagen_postgrado','Imagen Superior Area Postgrado','imagen_postgrado','postgrado',900,560);
	}
	public function pregrado_section($wp)
	{
		$this->agregar_seccion('pregrado','Configuracion Pregrado');
		$settings=array(
			'default'      => get_template_directory_uri().'/img/imagen_pregrado_por_defecto.jpg',
			'width'=>960,
			'height'=>560
			);
		
		$this->agregar_configuracion('imagen_pregrado',$settings);
		$this->agregar_control_texto('texto_titulo_pregrado','pregrado','Texto Titulo Pregrado','PREGRADO');
		$this->agregar_control_textarea('texto_pregrado','pregrado','Texto Intro Pregrado','La Facultad de Ciencias Políticas y Administración Pública de la Universidad Central de Chile imparte las carreras de Administración Pública y Ciencia Política.');
		$this->agregar_control_imagen_crop('imagen_pregrado','Imagen Superior Area Pregrado','imagen_pregrado','pregrado',900,560);
	
	}
	public function revistas_section($wp_manager)
	{
		$wp_manager->add_section( 'noticias_section', array(
			'title'          => 'Configuracion de Noticias',
			'priority'       => 36,
		) );
		$wp_manager->add_setting(
			'imagen_por_defecto',
			array(
				'default'      => get_template_directory_uri().'/img/noticia_defecto.png',
				'width'=>250,
				'height'=>150
			)
		);
		$wp_manager->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_manager,
				'imagen_por_defecto',
				array(
					'label'    => 'Imagen Noticia Por Defecto',
					'settings' => 'imagen_por_defecto',
					'section'  => 'noticias_section',
					'width'=>250,
					'height'=>150,
				)
			)
		);
	}
	public function news_section($wp_manager){
		$wp_manager->add_section( 'noticias_section', array(
			'title'          => 'Configuracion de Noticias',
			'priority'       => 36,
		) );
		$wp_manager->add_setting(
			'imagen_por_defecto',
			array(
				'default'      => get_template_directory_uri().'/img/noticia_defecto.png',
				'width'=>250,
				'height'=>150
			)
		);
		$wp_manager->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_manager,
				'imagen_por_defecto',
				array(
					'label'    => 'Imagen Noticia Por Defecto',
					'settings' => 'imagen_por_defecto',
					'section'  => 'noticias_section',
					'width'=>250,
					'height'=>150,
				)
			)
		);
	}
	public function eventos_section($wp_manager){
		$wp_manager->add_section( 'eventos_section', array(
			'title'          => 'Configuracion de Eventos',
			'priority'       => 36,
		) );
		$wp_manager->add_setting(
			'eventos_por_defecto',
			array(
				'default'      => get_template_directory_uri().'/img/eventos_defecto.png',
				'width'=>250,
				'height'=>150
			)
		);
		$wp_manager->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_manager,
				'eventos_por_defecto',
				array(
					'label'    => 'Imagen Eventos Por Defecto',
					'settings' => 'eventos_por_defecto',
					'section'  => 'eventos_section',
					'width'=>250,
					'height'=>150,
				)
			)
		);
	}
	public function autoridades_section($wp_manager){
		$wp_manager->add_section( 'autoridades_configuracion',array(
			'title'          => 'Configuracion de Autoridades',
			'priority'       => 36,
		));
		$wp_manager->add_setting(
			'autoridades_por_defecto',
			array(
				'default'      => get_template_directory_uri().'/img/autoridades_defecto.png',
			)
		);
		$wp_manager->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_manager,
				'autoridades_por_defecto',
				array(
					'label'    => 'Imagen Profesores Por Defecto',
					'settings' => 'autoridades_por_defecto',
					'section'  => 'autoridades_configuracion',
					'width'=>250,
					'height'=>230,
				)
			)
		);
	}
	public function docentes_section($wp_manager){
		$wp_manager->add_section( 'docentes_section', array(
			'title'          => 'Configuracion de Docentes',
			'priority'       => 36,
		) );
		$wp_manager->add_setting(
			'docentes_por_defecto',
			array(
				'default'      => get_template_directory_uri().'/img/docentes_defecto.png',
			)
		);
		$wp_manager->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_manager,
				'docentes_por_defecto',
				array(
					'label'    => 'Imagen Profesores Por Defecto',
					'settings' => 'docentes_por_defecto',
					'section'  => 'docentes_section',
					'width'=>250,
					'height'=>230,
				)
			)
		);
	}
	public function footer_section(){
		$this->wp->add_section( 'footer_section', array(
			'title'          => 'Configuracion de Footer',
			'priority'       => 36,
		) );
		// Add a text editor control
		$this->wp->add_setting( 'footer_text_setting', array(
			'default'        => '',
		) );
		$this->wp->add_control( new WP_Customize_Control( $this->wp, 'footer_text_setting', array(
			'label'   => 'Footer Text Setting',
			'section' => 'footer_section',
			'settings'   => 'footer_text_setting',
			'type'=>'textarea',
			'priority' => 11
		) ) );
	}
}
