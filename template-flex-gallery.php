<?php /* Template Name: Pagina Flex Gallery */ 

get_header(); ?>

<main role="main">
	<!-- section -->
	<section>
		<div class="container inner-container">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php if(get_field('incluir_titulo')){
					?><h1><?php the_title()?></h1><?php }?>
					<?php 
					if( get_field('colocar_slider') ):
						$sliders=new Sliders(get_field('tipo_de_post'),get_field('cantidad'),get_field('id'));
					$sliders->home();
					endif;
					?>
						<div class="col-xs-12 col-sm-9 No-Margin-Padding">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php
								get_template_part('flex','section');
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
				<div class="col-xs-12 col-sm-3">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
						[no widgets Right Panel]
					<?php endif; ?>
				</div>
				<div class="clearfix"></div>
			<div class="col-xs-12">
			<?php if (is_home() &&(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-Bottom')) ) : ?>
					[no widgets Bottom Panel]
				<?php endif; ?>
			</div>
			<!-- /container-fluid -->
		</div>
	</section>
</main>
<?php get_footer(); ?>
