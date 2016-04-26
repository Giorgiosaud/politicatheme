<?php get_header(); ?>

<!-- section -->

<div class="container-flex Eventos__Container">
	<div class="col-xs-12 col-sm-9">
		<?php get_template_part('loop','pregrados'); ?>
		<?php get_template_part('pagination'); ?>

	</div>
	<div class="col-xs-12 col-sm-3 widgets-right">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
				[no widgets Right Panel]
			<?php endif; ?>
	</div>

	<!-- /section -->
	<div class="clearfix"></div>
	</div>



	<?php get_footer(); ?>
