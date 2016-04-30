<?php
require(__DIR__.'/../Navwalkers/wp_bootstrap_navwalker.php');
function top_nav()
{
	$opts=array(
		'theme_location'  => 'top-menu',
		'menu'            => 'TopNav',
		'container'       => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'top-menu',
		'menu_class'      => 'nav navbar-nav',
		'menu_id'         => '',
		'echo'            => true,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<div class="container"><ul class="TopNav__List pull-right">%3$s</ul></div>',
		'depth'           => 0,
		// 'walker'          => new jorgelsaud\WordpressTools\NavWalker()
		);
	wp_nav_menu(
		$opts
		);
}
function main_nav($id)
{
	$opts=array(
		'theme_location'  => 'main-menu',
		'menu'    => 'main-menu',
		// 'depth'             => 3,
		'container'       => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => $id,
		'menu_class'      => 'nav navbar-nav col-xs-12',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
        );
	wp_nav_menu(
		$opts
		);
}