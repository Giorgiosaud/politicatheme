<?php /* Template Name: Pagina Flex */ 
use jorgelsaud\PoliticayGobierno\Sliders;
get_header(); ?>

<main role="main">
	<!-- section -->
	<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<div class="container-fluid">
				<?php 
				if( have_rows('flex_section') ):
					while ( have_rows('flex_section') ) : the_row();
						if( get_row_layout() == 'slider_home' ):
							$sliders=new Sliders(get_sub_field('tipo_de_post'),get_sub_field('cantidad'),get_sub_field('id'));
							$sliders->home();
						elseif( get_row_layout() == 'download' ): 

							$file = get_sub_field('file');
						endif;
					endwhile;
				else :
				endif;

				?>
			</div>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

		</article>
		<!-- /article -->

	<?php endif; ?>

</section>
<!-- /section -->
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
