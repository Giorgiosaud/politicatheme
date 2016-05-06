<?php get_header(); ?>

<!-- section -->

<div class="container inner-container">
	<div class="col-xs-12 col-sm-9">
		<?php get_template_part('loop','autoridades'); ?>
		<?php get_template_part('pagination'); ?>
	</div>
	<div class="col-xs-12 col-sm-3 widgets-right">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('widgets-right')) : ?>
			[no widgets Right Panel]
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
</div>
	</div>
	<?php get_footer(); ?>
