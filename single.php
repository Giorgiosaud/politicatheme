<?php get_header(); ?>
<div class="container <?php if(!is_home()){?>inner-container<?}?>">
	<div class="col-xs-12 col-sm-9">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

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
				<!-- /post title -->


				<?php the_content(); // Dynamic Content ?>


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
	<div class="Noticias__Internas__Categorias">
		<div class="Noticias__Internas__Categorias__Titulo">
			Categorías
		</div>
		<div class="Noticias__Internas__Categorias__Lista">
			<ul>
				<?php foreach($cats as $cat){
					?>
					<li><a href="<?php echo get_term_link($cat->term_id)?>"><?php echo $cat->name ?></a></li>
					<?php
				}?>
			</ul>
		</div>
	</div>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
		[no widgets Right Panel]
	<?php endif; ?>
</div>
</div>
<!-- /section -->
<div class="clearfix"></div>
</div>


<?php get_footer(); ?>
