<?php 
if (have_posts()):
	?>
<div class="Archivo__Contenedor">
	<?php
	while (have_posts()):
		the_post(); 
	?>

	<div class="col-xs-12 Noticia">
		<div class="Archivo__imagen">
			<?php the_post_thumbnail()?>
		</div>
		<div class="Titulo">
			<h1><?php the_title() ?></h1>
		</div>
		<div class="Resumen text-justify">
			<?php politica_excerpt('noticias_exp_length','noticias_more') ?>
		</div>
		<div class="BotonLeerMas btn btn-noticia">
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
