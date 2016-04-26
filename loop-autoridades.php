<?php 
if (have_posts()):
?>
<div class="Docentes__Contenedor Docentes__Internos">
<?php
	while (have_posts()):the_post(); 

if(get_field('foto')==null){
	$imagen=wp_get_attachment_image_src(get_theme_mod('autoridades_por_defecto'),'profesor')[0];
	if($imagen==''){
		$imagen=get_template_directory_uri().'/img/autoridades_defecto.png';
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
			<div class="Docente__resumen">
				<?php if( have_rows('cargos') ):?>
				<ul>
					<?	// loop through the rows of data
					while ( have_rows('cargos') ) : the_row();
					?>
					
					<li class="estudio"><?php the_sub_field('puesto')?></li>
					<?php endwhile;?>
				</ul>
			<?php endif;?>
				<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	</div>
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
