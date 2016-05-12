<?php get_header(); ?>
<div class="container <?php if(!is_home()){?>inner-container<?}?>">
	<div class="col-xs-12 col-sm-9">
		<?php if (have_posts()): while (have_posts()) : the_post(); 
		if(get_field('foto')==null){
			$imagen=wp_get_attachment_image_src(get_theme_mod('docentes_por_defecto'),'profesor')[0];
			if($imagen==''){
				$imagen=get_template_directory_uri().'/img/docentes_defecto.png';
			}
		}
		else{
			$imagen=get_field('foto');
		}?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<?php if( have_rows('cargos') ):?>
					<?php while ( have_rows('cargos') ) : the_row();?>
						<div class="Docente__Cargo">
							<?php the_sub_field('puesto')?>
						</div>
					<?php endwhile;?>
				<?php endif;?>
			<!-- /post title -->
			<img class="alignleft" src="<?php echo $imagen ?>" alt="imagen"> 

			<?php the_content(); // Dynamic Content ?>

			<div class="clearfix"></div>
			<h1>Curriculum:</h1>
			<?php if( have_rows('curriculum') ):?>
				<ul>
					<?	// loop through the rows of data
					$CantidadElementosCurriculum=0;
					while ( have_rows('curriculum') ) : the_row();
					?>
					

					<li class="estudio"><?php the_sub_field('estudios')?></li>
				<?php endwhile;?>
			</ul>
			<?
			endif;?>


			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>

		<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

	</article>
	<!-- /article -->

<?php endif; ?>

</div>
<div class="col-xs-12 col-sm-3 widgets-right">
	<?php $cats=get_categories(array('taxonomy'=>'events_cat'));
	?>

	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
		[no widgets Right Panel]
	<?php endif; ?>
</div>
</div>
<!-- /section -->
<div class="clearfix"></div>
</div>

<?php get_footer(); ?>
