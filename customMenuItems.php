<?php
/**
 * Hardcodes shop item in navigation
 * @param string $items HTML with navigation items
 * @param object $args navigation menu arguments
 * @return string all navigation items HTML
 */
function new_nav_menu_items($items, $args) {
    if($args->theme_location == 'main-menu'){
       $BuscarField = '<li class="spec pull-right"><form class="navbar-form navbar-right form-inline" role="search">
							<div class="form-group">
								<label for="search">Buscar</label>
								<input type="text" id="search" name="s" class="form-control">
							</div>
						</form></li>';
       $items = $items . $BuscarField;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);