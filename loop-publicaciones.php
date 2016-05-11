<?php 
if (have_posts()):
	?>
<div class="Publicaciones__Contenedor Publicaciones__Interno	s">
	<?php
	while (have_posts()):
		the_post(); 
	$imagen=get_field('imagen_de_la_publicacion');
	if($imagen==null){
		$terms = get_the_terms( get_the_ID(), 'publicaciones_category');

		if( !empty($terms) ) {

			$term = array_pop($terms);
			$imagen = get_field('imagen_por_defecto', $term );
		}
		if($imagen==null){
			$imagen=wp_get_attachment_image_src(get_theme_mod('Publicaciones_por_defecto'),'publicacion')[0];

			if($imagen==null){
				$imagen=get_template_directory_uri().'/img/imagen_publicaciones_por_defecto.jpg';
			}
		}
	}

	?>

	<div class="col-xs-12 col-sm-4 Publicacion">
		<div class="Publicacion__Elemento">
			<div class="Publicacion__imagen">
				<img src="<?php echo $imagen ?>" alt="imagen"> 
			</div>
			<div class="Publicacion__titulo">
				<?php the_title()?>
				<?php if(get_field('fecha_publicacion')!=''){?>
				<span class="fecha"><?php echo date_i18n('F Y',DateTime::createFromFormat('!d/m/Y', get_field('fecha_publicacion'))->getTimestamp()) ?></span>
				<?php }?>
			</div>
			<div class="Publicacion__resumen">
				<?php politica_excerpt('publicacion_exp_length','noticias_more') ?>
				<div class="clearfix"></div>
			</div>
			<div class="Publicacion__botonLeerMas btn btn-Publicacion pull-right">
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
