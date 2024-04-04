<?php


function my_custom_theme_enqueue_styles() {

  // Enqueue jQuery
  wp_enqueue_script('jquery');

  // Enqueue Bootstrap CSS and JS
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);

  // Enqueue Slick Slider CSS and JS
  wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true);

  // Enqueue Font Awesome CSS
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

  // Enqueue your theme's stylesheet
  wp_enqueue_style('style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');

function theme_setup() {
    // Add support for navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'text_domain'), // Replace 'primary' with your menu location name
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Register a custom post type for image gallery
function custom_image_gallery_post_type() {
    $labels = array(
        'name'               => 'Slider Gallery',
        'singular_name'      => 'Image',
        'menu_name'          => 'Slider Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Slide',
        'edit_item'          => 'Edit Image',
        'new_item'           => 'New Image',
        'view_item'          => 'View Image',
        'search_items'       => 'Search Images',
        'not_found'          => 'No images found',
        'not_found_in_trash' => 'No images found in Trash',
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-image',
        'supports'            => array('title', 'thumbnail' , 'editor'),
        'rewrite'             => array('slug' => 'slider_gallery'),
    );
    
    register_post_type('slider_gallery', $args);
}
add_action('init', 'custom_image_gallery_post_type');



// Enable featured image for custom post type
add_theme_support('post-thumbnails');

function custom_text_content_post_type() {
    
    $labels = array(
        'name'               => 'Quote Content',
        'singular_name'      => 'Quote Content',
        'menu_name'          => 'Quote Content',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Text Content',
        'edit_item'          => 'Edit Text Content',
        'new_item'           => 'New Text Content',
        'view_item'          => 'View Text Content',
        'search_items'       => 'Search Text Content',
        'not_found'          => 'No text content found',
        'not_found_in_trash' => 'No text content found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-text',
        'supports'            => array('title', 'editor'), // Add 'editor' for text content
        'rewrite'             => array('slug' => 'text-content'),
    );

    register_post_type('text_content', $args);
}
add_action('init', 'custom_text_content_post_type');

function create_sherbimet_post_type() {
    register_post_type('sherbimet', array(
        'labels' => array(
            'name' => 'Sherbimet',
            'singular_name' => 'Sherbimi',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'sherbimet'),
    ));
}
add_action('init', 'create_sherbimet_post_type');

function create_video_post_type() {
    register_post_type('video', array(
        'labels' => array(
            'name' => 'Videot',
            'singular_name' => 'Video',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'supports' => array('title', 'editor', 'thumbnail', 'video'),
        'rewrite' => array('slug' => 'videot'),
    ));
}
add_action('init', 'create_video_post_type');

class Custom_Nav_Walker extends Walker_Nav_Menu {
    // Add main menu classes for li and a elements
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML for output
        $output .= $indent . '<a href="' . $item->url . '" class="button ' . $class_names . '">';
        $output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $output .= '</a>';
    }
}