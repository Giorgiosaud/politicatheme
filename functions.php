<?php

use jorgelsaud\PoliticayGobierno\Initializer;

require_once('vendor/autoload.php');
require_once('FlexFunctions/flex-sliders.php');
require_once('customMenuItems.php');
require_once('customizerOptions.php');
require_once('custom-posts/all.php');
require_once('custom-taxonomies/all.php');
require_once('widget/all.php');
$i=new Initializer();
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
	\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
	\*------------------------------------*/

	if (!isset($content_width))
	{
		$content_width = 900;
	}

	if (function_exists('add_theme_support'))
	{
	// Add Menu Support
		add_theme_support('menus');

	// Add Thumbnail Theme Support
		add_theme_support('post-thumbnails');
		add_image_size('large', 700, '', true);
		add_image_size('medium', 250, '', true);
		add_image_size('small', 120, '', true);
		add_image_size('slider-incio', 850, 400, true);
		add_image_size('imagen-fija-interna', 960, 560, true);
		add_image_size('noticia', 250, 150, true);
		add_image_size('evento', 250, 150, true); 
		add_image_size('publicacion', 250, 200, true); 
		add_image_size('profesor', 250, 230, true);
		add_image_size('mainPregrado',960,560,true);
	// Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
	));*/

	// Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
	));*/

	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Localisation Support
	load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
	\*------------------------------------*/

// HTML5 Blank navigation
// 
// 
// 
// 
	function change_post_menu_label() {
		global $menu;
		global $submenu;
	// die(var_dump($menu));
		$menu[5][0] = 'Notícias';
		$menu[5][6] = 'dashicons-megaphone';
		$submenu['edit.php'][5][0] = 'Todas las Notícias';
		$submenu['edit.php'][10][0] = 'Añadir Notícias';

		echo '';
	}

	function change_post_object_label() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Notícias';
		$labels->singular_name = 'Notícia';
		$labels->add_new = 'Añadir Notícia';
		$labels->add_new_item = 'Añadir Notícia';
		$labels->edit_item = 'Editar Notícia';
		$labels->new_item = 'Notícia';
		$labels->view_item = 'Ver Notícia';
		$labels->search_items = 'Buscar Notícias';
		$labels->not_found = 'No se encontraron Notícias';
		$labels->not_found_in_trash = 'No se encontraron Notícias en la Papelera';
	}
	add_action('init', 'change_post_object_label');
	add_action('admin_menu', 'change_post_menu_label');

	function html5blank_nav()
	{
		wp_nav_menu(
			array(
				'theme_location'  => 'header-menu',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'menu-{menu slug}-container',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				)
			);
	}

// Load HTML5 Blank scripts (header.php)
	function html5blank_header_scripts()
	{
		if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

		wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
		wp_enqueue_script('conditionizr'); // Enqueue it!

		wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
		wp_enqueue_script('modernizr'); // Enqueue it!

		wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
		wp_enqueue_script('html5blankscripts'); // Enqueue it!
	}
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
	if (is_page('pagenamehere')) {
		wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
		wp_enqueue_script('scriptname'); // Enqueue it!
	}
}

// Load HTML5 Blank styles
function html5blank_styles()
{
	wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
	wp_enqueue_style('normalize'); // Enqueue it!

	wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
	wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{

}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
	return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
			unset($classes[$key]);
		}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class($post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class($post->post_name);
	}

	return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
	// Define Sidebar Widget Area 1
	register_sidebar(array(
		'name' => __('Right', 'html5blank'),
		'description' => __('this is the main right sidebar', 'html5blank'),
		'id' => 'widgets-right',
		'before_widget' => '<div id="%1$s" class="%2$s single-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		));
	register_sidebar(array(
		'name' => __('Bottom', 'html5blank'),
		'description' => __('this is the main bottom sidebar', 'html5blank'),
		'id' => 'widgets-bottom',
		'before_widget' => '<div id="%1$s" class="%2$s col-xs-12 col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		));

}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
		));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'prev_text'    => '<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>',
		'next_text'    => '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>'
		));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using politica_excerpt('html5wp_index');
{
	return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using politica_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
	return 40;
}

// Create the Custom Excerpts callback
function politica_excerpt($length_callback = '', $more_callback = '')
{
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	echo $output;
}
function get_politica_excerpt($length_callback = '', $more_callback = '')
{
	global $post;
	if (function_exists($length_callback)) {
		add_filter('excerpt_length', $length_callback);
	}
	if (function_exists($more_callback)) {
		add_filter('excerpt_more', $more_callback);
	}
	$output = get_the_excerpt();
	$output = apply_filters('wptexturize', $output);
	$output = apply_filters('convert_chars', $output);
	$output = '<p>' . $output . '</p>';
	return $output;
}
function noticias_more(){
	global $post;
	return '...';
}
function eventos_exp_length(){
	return 10;
}
function publicacion_exp_length(){
	return 6;
}
function noticias_exp_length(){
	return 20;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
	global $post;
	return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
	return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
	return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
	$myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
	$avatar_defaults[$myavatar] = "Custom Gravatar";
	return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
	}
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<!-- heads up: starting < for the html tag (li or div) in the next line: -->
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
			<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</div>

		<?php comment_text() ?>

		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
	\*------------------------------------*/

// Add Actions
// add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
	\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5()
// {
//     register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'html5-blank');
//     register_post_type('html5-blank', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//             'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//             'add_new' => __('Add New', 'html5blank'),
//             'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//             'edit' => __('Edit', 'html5blank'),
//             'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//             'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//             'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//             'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//             'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
	ShortCode Functions
	\*------------------------------------*/

// Shortcode Demo with Nested Capability
	function html5_shortcode_demo($atts, $content = null)
	{
	return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
	return '<h2>' . $content . '</h2>';
}





//Customizer


function mytheme_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	//Settings
	$wp_customize->add_setting( 'footer-text',array(
		'default'=>'Universidad Central de Chile • Todos los derechos reservados Edificio Vicente Kovacevic II • Avenida Santa Isabel 1278, Santiago de Chile Fono: (+56 2) 582 6601 • politicaygobierno”@”ucentral.cl ',//A default value for the setting if none is defined
		//'type'=>'theme_mod',//Optional. Specifies the TYPE of setting this is. Options are 'option' or 'theme_mod' (defaults to 'theme_mod')
		//'capability'=>'edit_theme_options'//Optional. You can define a capability a user must have to modify this setting. Default if not specified: edit_theme_options
		// 'theme_supports'=>//Optional. This can be used to hide a setting if the theme lacks support for a specific feature (using add_theme_support).
		// 'transport'=>''//Optional. This can be either 'refresh' (default) or 'postMessage'. Only set this to 'postMessage' if you are writing custom Javascript to control the Theme Customizer's live preview.
		// 'sanitize_callback'=> //Optional. A function name to call for sanitizing the input value for this setting. The function should be of the form of a standard filter function, where it accepts the input data and returns the sanitized data.
		//'sanitize_js_callback'=>''//Optional. A function name to call for sanitizing the value for this setting for the purposes of outputting to javascript code. The function should be of the form of a standard filter function, where it accepts the input data and returns the sanitized data. This is only necessary if the data to be sent to the customizer window has a special form.

		));
	//Sections
	$wp_customize->add_section( 'Footer' , array(
		'title'      => __( 'Footer', 'html5blank' ),
		'priority'   => 30,
		'description' =>__( 'Everithing Related with Footer', 'html5blank' ),
		) );
	add_action( 'customize_register', 'mytheme_customize_register' );
	// controls
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Footer Text', 'html5blank' ),
		'section'    => 'Footer',
		'settings'   => 'footer_text',
		) ) );


	function widget_nav_menu_modifications($nav_menu_args, $nav_menu, $args, $instance){
		return $nav_menu_args=array(
			'theme_location'  => 'bottom-menu',
			'menu'    => 'bottom-menu',
			// 'depth'             => 3,
			'container'       => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => $id,
			'menu_class'      => 'nav navbar-nav col-xs-12',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
			);
	};
	add_filter('widget_nav_menu_args','widget_nav_menu_modifications',10,4);
	}

function get_terms_id_by_post_type( $taxonomies, $post_types ) {
    global $wpdb;
    $query = $wpdb->get_col( "SELECT t.term_id from $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id WHERE p.post_type IN('" . join( "', '", $post_types ) . "') AND tt.taxonomy IN('" . join( "', '", $taxonomies ) . "') GROUP BY t.term_id");
    return $query;
}
?>
