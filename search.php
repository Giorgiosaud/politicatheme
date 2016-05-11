<?php get_header(); ?>
<div class="container <?php if(!is_home()){?>inner-container<?}?>">
	<div class="col-xs-12 col-sm-9">
	
			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

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
