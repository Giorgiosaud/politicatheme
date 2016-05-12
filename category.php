<?php get_header(); ?>

<!-- section -->

<div class="container inner-container">
	<div class="col-xs-12 col-sm-9">
		<h1><?php single_cat_title(); ?></h1>
		<?php get_template_part('loop-noticias'); ?>


		<?php get_template_part('pagination'); ?>

	</div>
	<div class="col-xs-12 col-sm-3 widgets-right">
		<?php $cats=get_categories();?>
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
