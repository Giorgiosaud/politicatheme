<?php
new theme_customizer();
class theme_customizer{
	public function __construct()
	{
		// add_action ('admin_menu', array(&$this, 'customizer_admin'));
		add_action( 'customize_register', array(&$this, 'customize_manager_demo' ));
	}
	public function customize_manager_demo( $wp_manager )
	{
		$this->footer_section( $wp_manager );
        $this->news_section( $wp_manager );
        $this->events_section( $wp_manager );
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
    public function events_section($wp_manager){
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
                'imagen_por_defecto',
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
    public function footer_section($wp_manager){
      $wp_manager->add_section( 'footer_section', array(
        'title'          => 'Configuracion de Footer',
        'priority'       => 36,
        ) );
         // Add a text editor control
      $wp_manager->add_setting( 'footer_text_setting', array(
        'default'        => '',
        ) );
      $wp_manager->add_control( new WP_Customize_Control( $wp_manager, 'footer_text_setting', array(
        'label'   => 'Footer Text Setting',
        'section' => 'footer_section',
        'settings'   => 'footer_text_setting',
        'type'=>'textarea',
        'priority' => 11
        ) ) );
  }
}