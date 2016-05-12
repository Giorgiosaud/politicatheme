<?php 
if (have_posts()):
	?>
<div class="Docentes__Contenedor Docentes__Internos">
	<?php
	while (have_posts()):the_post(); 

	if(get_field('foto')==null){
		$imagen=wp_get_attachment_image_src(get_theme_mod('docentes_por_defecto'),'profesor')[0];
		if($imagen==''){
			$imagen=get_template_directory_uri().'/img/docentes_defecto.png';
		}
	}
	else{
		$imagen=get_field('foto');
	}

	?>

	<div class="Docente">
		<div class="col-xs-12 Docente__Elemento">
			<div class="Docente__imagen col-xs-12 col-sm-4">
				<img src="<?php echo $imagen ?>" alt="imagen"> 
			</div>
			<div class="Docente__texto col-xs-12 col-sm-8">
				<h1 class="Docente__titulo text-politica">
					<?php the_title()?>
				</h1>
				<?php if (get_field('cargo')):?>
				<div class="Docente__Cargo">
					<?php the_field('cargo')?>
				</div>
			<?php endif;?>
				<div class="Docente__resumen">
					<?php if( have_rows('curriculum') ):?>
						<ul>
					<?	// loop through the rows of data
					$CantidadElementosCurriculum=0;
					while ( have_rows('curriculum') ) : the_row();
					if($CantidadElementosCurriculum==3){
						break;
					}
					$CantidadElementosCurriculum++;
					?>
					

					<li class="estudio"><?php the_sub_field('estudios')?></li>
				<?php endwhile;?>
			</ul>
		<?php endif;?>
		<div class="clearfix"></div>
	</div>
</div>
<div class="Noticia__botonLeerMas btn btn-noticia Docente__Boton">
	<a href="<?php the_permalink() ?>">Ver Más</a>
</div>
</div>
<div class="clearfix"></div>
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
<div class="clearfix"></div>

</div>
