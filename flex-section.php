<?php
use jorgelsaud\PoliticayGobierno\Sliders;
use jorgelsaud\PoliticayGobierno\Noticias;
use jorgelsaud\PoliticayGobierno\HTML;
use jorgelsaud\PoliticayGobierno\Formulario;
use jorgelsaud\PoliticayGobierno\Direccion;
use jorgelsaud\PoliticayGobierno\ImagenFija;
use jorgelsaud\PoliticayGobierno\PostgradoTipo;
if( have_rows('flex_section') ){
	while ( have_rows('flex_section') ){ 
		the_row();
		switch (get_row_layout()){
			case 'display_posts':
			$noticias=new Noticias(get_sub_field('titulo'),get_sub_field('tipo_de_post'),get_sub_field('category'),get_sub_field('cantidad'),get_sub_field('id'));
			$noticias->show();
			break;
			case 'display_postgrado_type':
			$tipoDePostgrado=new PostgradoTipo(get_sub_field('titulo'),get_sub_field('tipo'));
			$tipoDePostgrado->show();
			break;
			case 'add_html':
			$html=new HTML(get_sub_field('contenido'),get_sub_field('class'),get_sub_field('link'));
			$html->show();
			break;
			case 'imagen_fija_con_titulo':
			$imagenFija=new ImagenFija(get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('sub-titulo'));
			$imagenFija->show();
			break;
			case 'formulario_de_contacto':
			$formulario=new Formulario(get_sub_field('mensaje_superior'));
			$formulario->show();
			break;
			case 'direccion':
			$direccion=new Direccion(get_sub_field('titulo'),get_sub_field('direccion'),get_sub_field('imagen'));
			$direccion->show();
			break;

		}
	}
}