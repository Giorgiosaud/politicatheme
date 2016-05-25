<?php 
if (have_posts()):
	?>
<div class="ArchivoPregrado__Contenedor">
	<?php
	while (have_posts()):
		the_post(); 
	?>

	<div class="EstudioPregrado__Contenedor">
		<div class="EstudioPregrado__Encabezado">
			<div class="EstudioPregrado__Titulo">
				<?php the_title() ?>
			</div>
			<div class="BotonLeerMas btn btn-estudio">
			<a href="<?php the_permalink() ?>">Ver Más</a>
			</div>
		</div>
		<div class="EstudioPregrado__Triangulo"></div>
		<div class="EstudioPregrado__Resumen">
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
