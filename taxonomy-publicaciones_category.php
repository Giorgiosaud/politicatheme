<?php get_header(); ?>

<!-- section -->

<div class="container inner-container">
	<div class="col-xs-12 col-sm-9">
		<?php get_template_part('loop','publicaciones'); ?>
		<?php get_template_part('pagination'); ?>

	</div>
	<div class="col-xs-12 col-sm-3 widgets-right">
		<div class="Noticias__Internas__Categorias">
			<div class="Noticias__Internas__Categorias__Titulo">
				Categorías
			</div>
			<div class="Noticias__Internas__Categorias__Lista">
				<?php cat_nav('publicaciones-menu');?>
			</div>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
				[no widgets Right Panel]
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- /section -->
<div class="clearfix"></div>
</div>



<?php get_footer(); ?>
