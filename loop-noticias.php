<?php
use jorgelsaud\PoliticayGobierno\Sliders;
$sliders=new Sliders('post',3,'innerSlider');
$sliders->inner();
?>
<?php 
if (have_posts()):
	?>
<div class="Noticias__Contenedor Noticias__Internas">
	<?php
	while (have_posts()):
		the_post(); 
		
		if(get_field('imagen_noticia')==null){
			$imagen=wp_get_attachment_image_src(get_theme_mod('imagen_por_defecto'),'noticia')[0];
			if($imagen==''){
				$imagen=get_template_directory_uri().'/img/noticia_defecto.png';
			}
		}
		else{
			$imagen=get_field('imagen_noticia');
		}

	?>

	<div class="col-xs-12 col-sm-4 Noticia">
		<div class="Noticia__imagen">
			<img src="<?php echo $imagen ?>" alt="imagen">
		</div>
		<div class="Noticia__titulo">
			<?php the_title() ?>
		</div>
		<div class="Noticia__resumen text-justify">
			<?php politica_excerpt('noticias_exp_length','noticias_more') ?>
		</div>
		<div class="Noticia__botonLeerMas btn btn-noticia pull-right">
			<a href="<?php the_permalink() ?>">Ver Más</a>
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
