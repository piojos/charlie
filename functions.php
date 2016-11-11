<?php
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

if (function_exists('add_theme_support'))
{
	// Add Menu Support
	add_theme_support('menus');

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	// add_image_size('large', 700, '', true); // Large Thumbnail
	// add_image_size('medium', 250, '', true); // Medium Thumbnail
	// add_image_size('small', 120, '', true); // Small Thumbnail
	// add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Localisation Support
	load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
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

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'Style', get_stylesheet_uri() );
	wp_enqueue_style( 'Hint', get_template_directory_uri() . '/css/hint.min.css');
	wp_enqueue_script( 'Slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery') );
	wp_enqueue_script( 'Magic', get_template_directory_uri() . '/js/scripts.js');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


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



// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}



// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
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



function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCG3l_pG-5BMKnGDpYenf_eUgVSy0wtPes');
}
add_action('acf/init', 'my_acf_init');



if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones Generales',
		'menu_title'	=> 'Opciones',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Opciones de Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Opciones de Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'general-settings',
	));
}




/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function create_pt_food() {
	register_taxonomy_for_object_type('category', 'charlie');
	register_post_type('food',
		array(
		'labels' => array(
			'name' => __('Platillos', 'charlie'), // Rename these to suit
			'singular_name' => __('Platillo', 'charlie'),
			'add_new' => __('Nuevo', 'charlie'),
			'add_new_item' => __('Agregar nuevo platillo', 'charlie'),
			'edit' => __('Editar', 'charlie'),
			'edit_item' => __('Editar platillo', 'charlie'),
			'new_item' => __('Nuevo platillo', 'charlie'),
			'view' => __('Ver platillo', 'charlie'),
			'view_item' => __('Ver platillo', 'charlie'),
			'search_items' => __('Buscar platillo', 'charlie'),
			'not_found' => __('No se encontró ningún platillo', 'charlie'),
			'not_found_in_trash' => __('No se encontró ningún platillo en la basura', 'charlie')
		),
		'public' => true,
		'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
		'has_archive' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		), // Go to Dashboard Custom HTML5 Blank post for supports
		'can_export' => true, // Allows export in Tools > Export
		'taxonomies' => array(
			'category'
		) // Add Category and Post Tags support
	));
}
add_action( 'init', 'create_pt_food' );

function create_pt_promos() {
	register_post_type('promos',
		array(
		'labels' => array(
			'name' => __('Promociones', 'charlie'), // Rename these to suit
			'singular_name' => __('Promoción', 'charlie'),
			'add_new' => __('Nueva', 'charlie'),
			'add_new_item' => __('Agregar nueva promoción', 'charlie'),
			'edit' => __('Editar', 'charlie'),
			'edit_item' => __('Editar promoción', 'charlie'),
			'new_item' => __('Nueva promoción', 'charlie'),
			'view' => __('Ver promoción', 'charlie'),
			'view_item' => __('Ver promoción', 'charlie'),
			'search_items' => __('Buscar promoción', 'charlie'),
			'not_found' => __('No se encontró ninguna promoción', 'charlie'),
			'not_found_in_trash' => __('No se encontró ninguna promoción en la basura', 'charlie')
		),
		'public' => true,
		'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
		'has_archive' => true,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail'
		), // Go to Dashboard Custom HTML5 Blank post for supports
		'can_export' => true // Allows export in Tools > Export
	));
}
add_action( 'init', 'create_pt_promos' );



/* Allow .SVG */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');






function blockClass($op) {
	if( get_row_layout() == 'promo' ) {
		if(in_array('content', $op)) { $classes .= ' complex'; } else {$classes .= ' simple no_text'; }
	}
	if(in_array('push_top', $op)) $classes .= ' push_top';
	if(in_array('push_bot', $op)) $classes .= ' push_bot';
	if(in_array('pad_top', $op)) $classes .= ' pad_top';
	if(in_array('pad_bot', $op)) $classes .= ' pad_bot';

	return $classes;
}
