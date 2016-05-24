<?php get_header(); 
$imagen=wp_get_attachment_image_src(get_theme_mod('imagen_pregrado'),'mainPregrado')[0];
if($imagen==null){
	$imagen=get_template_directory_uri().'/img/imagen_pregrado_por_defecto.jpg';
}
?>

<!-- section -->

<div class="container inner-container">
	<div class="col-xs-12 col-sm-9">
		<div class="col-xs-12 No-Margin-Padding">
			<div class="Estudios__Imagen">
				<img src="<?= $imagen ?>" alt="Imagen Estudios Titulo" class="img-responsive full-width">
				<div class="Estudios__Titulo">
					<?= get_theme_mod('texto_titulo_postgrado','Postgrado y Educación Continua')?>
				</div>
			</div>
			<div class="Estudios__Subtitulo">
				<?php politica_excerpt('noticias_exp_length','noticias_more') ?>
			</div>
		</div>
		<?php get_template_part('loop','postgrados'); ?>
		<?php get_template_part('pagination'); ?>

	</div>

	<div class="col-xs-12 col-sm-3 widgets-right">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
		[no widgets Right Panel]
		<?php endif; ?>
	</div>
	</div>

	<!-- /section -->
	<div class="clearfix"></div>
</div>



<?php get_footer(); ?>
