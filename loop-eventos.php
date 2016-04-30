<?php 
query_posts( array('posts_per_page=12','post_type' => 'eventosgszp' ));
if (have_posts()):
	?>
<div class="Eventos__Contenedor Eventos__Internos">
	<?php
	while (have_posts()):
		the_post(); 

	if(get_field('imagen_del_evento')==null){
		$imagen=wp_get_attachment_image_src(get_theme_mod('eventos_por_defecto'),'evento')[0];
		if($imagen==''){
			$imagen=get_template_directory_uri().'/img/eventos_defecto.png';
		}
	}
	else{
		$imagen=get_field('imagen_del_evento');
	}

	?>

	<div class="col-xs-12 col-sm-4 Evento">
		<div class="Evento__Elemento">
			<div class="Evento__imagen">
				<img src="<?php echo $imagen ?>" alt="imagen"> 
			</div>
			<div class="Evento__titulo">
				<span class="fecha"><?php echo date_i18n('d \d\e F',strtotime(get_field('fecha_del_evento'))) ?></span> <span class="hora"><?php the_field('hora_del_evento')?></span>
			</div>
			<div class="Evento__resumen">
				<?php politica_excerpt('eventos_exp_length','noticias_more') ?>
				<div class="clearfix"></div>
			</div>
			<div class="Evento__botonLeerMas btn btn-evento pull-right">
				<a href="<?php the_permalink() ?>">Ver Más</a>
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
	<?php
	endwhile;
	else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>

</div>
