<?php

function show_slider_home(){
	// WP_Query arguments
	// the_sub_field('tipo_de_post')
	$args = array (
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => '3',
		'order'                  => 'ASC',
		'orderby'                => 'date',
		'meta_query'             => array(
			array(
				'key'       => 'is_slider',
				'value'     => '1',
				'compare'   => '==',
				),
			),
		);
	$sliders_posts=[];

// The Query
	$slider_posts_query = new WP_Query( $args );
	 // die(var_dump($slider_posts_query->have_posts()));
	$i=0;
// The Loop
	if ( $slider_posts_query->have_posts() ) {

		while ( $slider_posts_query->have_posts() ) {
			$slider_posts_query->the_post();
			$slide=new Slide(get_field('titulo_slide'),get_field('subtitulo_slide'),get_field('imagen_slider'));
			array_push($sliders_posts,$slide);
		}
	} else {
	// no posts found
	}
	die(var_dump($sliders_posts));
// Restore original Post Data
	wp_reset_postdata();
	// the_sub_field('tipo_de_post');
	// the_sub_field('cantidad');
}