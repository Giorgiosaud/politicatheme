<?php /* Template Name: Pagina Flex */ 
use jorgelsaud\PoliticayGobierno\Sliders;
use jorgelsaud\PoliticayGobierno\Noticias;
use jorgelsaud\PoliticayGobierno\HTML;
use jorgelsaud\PoliticayGobierno\ImagenFija;
use jorgelsaud\PoliticayGobierno\PostgradoTipo;
get_header(); ?>

<main role="main">
	<!-- section -->
	<section>
		<div class="container <?php if(is_home()){?>inner-container<?}?>">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php if(get_field('incluir_titulo')){
				?><h1><?php the_title()?></h1><?php }?>
				<?php 
				if( get_field('colocar_slider') ):
					$sliders=new Sliders(get_field('tipo_de_post'),get_field('cantidad'),get_field('id'));
				$sliders->home();
				endif;
				?>
				<div class="Flex__content">
					<div class="col-xs-12 col-sm-9">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php

							if( have_rows('flex_section') ){
								while ( have_rows('flex_section') ){ 
									the_row();
									switch (get_row_layout()){
										case 'display_posts':
										$noticias=new Noticias(get_sub_field('titulo'),get_sub_field('tipo_de_post'),get_sub_field('category'),get_sub_field('cantidad'),get_sub_field('id'));
										$noticias->show();
										break;
										case 'display_postgrado_type':
										$tipoDePostgrado=new PostgradoTipo(get_sub_field('titulo'),get_sub_field('tipo'));
										$tipoDePostgrado->show();
										break;
										case 'add_html':
										$html=new HTML(get_sub_field('contenido'),get_sub_field('class'));
										$html->show();
										break;
										case 'imagen_fija_con_titulo':
										$imagenFija=new ImagenFija(get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('sub-titulo'));
										$imagenFija->show();
										break;

									}
								}
							}

							?>
							<?php the_content(); ?>
							
							<?php edit_post_link(); ?>
							<br class="clear">
						</article>
					</div>
					<!-- /article -->

				<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<div class="col-xs-12 col-sm-9 No-Margin-Padding">
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

					</article>
				</div>
				<!-- /article -->

			<?php endif; ?>
			<div class="col-xs-12 col-sm-3 No-Margin-Padding">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
					[no widgets Right Panel]
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
			<!-- /Flex__content -->
		</div>
		<div class="col-xs-12 No-Margin-Padding">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-Bottom')) : ?>
				[no widgets Bottom Panel]
			<?php endif; ?>
		</div>
		<!-- /container-fluid -->
		</div>
</section>
</main>
<?php get_footer(); ?>
