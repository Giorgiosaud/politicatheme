<?php 
if (have_posts()):
	?>
<div class="Archivo__Contenedor">
	<?php
	while (have_posts()):
		the_post(); 
	?>

	<div class="Estudio__Contenedor">
		<div class="Estudio__Encabezado">
			<div class="col-xs-12 Estudio__Titulo">
				<?php the_title() ?>
			</div>
			<div class="BotonLeerMas btn btn-estudio">
			<a href="<?php the_permalink() ?>">Ver Más</a>
			</div>
		</div>
		<div class="Estudio__Resumen">
			<?php politica_excerpt('noticias_exp_length','noticias_more') ?>
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
