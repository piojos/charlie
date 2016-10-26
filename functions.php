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
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/scripts.js', array('jquery') );
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

// // Custom View Article link to Post
// function html5_blank_view_article($more)
// {
//     global $post;
//     return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
// }




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
// function html5_shortcode_demo($atts, $content = null)
// {
//     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
// }
//
// // Shortcode Demo with simple <h2> tag
// function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// {
//     return '<h2>' . $content . '</h2>';
// }

?>
