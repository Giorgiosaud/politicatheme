<?php /* Template Name: Pagina Flex */ 
use jorgelsaud\PoliticayGobierno\Sliders;
use jorgelsaud\PoliticayGobierno\Noticias;
use jorgelsaud\PoliticayGobierno\HTML;
get_header(); ?>

<main role="main">
	<!-- section -->
	<section>
		<div class="container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

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
										case 'add_html':
										$html=new HTML(get_sub_field('contenido'),get_sub_field('class'),get_sub_field('link'));
										$html->show();

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
				<div class="col-xs-12 col-sm-9">
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

					</article>
				</div>
				<!-- /article -->

			<?php endif; ?>
			<div class="col-xs-12 col-sm-3 widgets-right">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
					[no widgets Right Panel]
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
			<!-- /Flex__content -->
		</div>
		<div class="col-xs-12 widgets-bottom">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-bottom')) : ?>
					[no widgets Bottom]
				<?php endif; ?>
		</div>
		<!-- /container-fluid -->
	</div>
</section>
</main>
<?php get_footer(); ?>
